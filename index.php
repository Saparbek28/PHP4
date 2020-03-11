<!DOCTYPE html>
<html lang="en">
<title>Document</title>
</head>
<body>
<?= tag('a', 'home', ['href' => 'index.php'])?>
<?= tag('input', '', ['name' => 'date'], true)?>
</body>
</html>


<?php
function render(string $path, array $vars = []){
    if(file_exists($path)){
        foreach($vars as $key => $value){
            $$key = $value;
        }
        include $path;
    }
    else
        die("File is not exist");
}

// 2
function tag(string $name, $body, array $arr = [], bool $open = false)
{
    $res = "<$name";
    foreach ($arr as $key => $value) {
        $res .= " {$key}=\"{$value}\"";
    }
    if ($open) {
        $res .= " />";
    } else {
        $res .= " >$body</$name>";
    }
    return $res;
}

?>

