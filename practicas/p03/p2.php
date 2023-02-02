<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;
<html>
<head>
    <title>Práctica 2</title>
</head>
<body>
    <h2>Inciso 2</h2>
    <?php
    $a = "ManejadorSQL";
    echo "$a<br>";

    $b = 'MySQL';
    echo "$b<br>";

    $c = &$a;
    echo "$c<br>";
    
    $a = "PHP server";
    echo "$a<br>";

    $b = &$a;
    echo "$b<br>";

    ?>
</body>
</html>