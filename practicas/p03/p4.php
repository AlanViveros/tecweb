<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;
<html>
<head>
    <title>Práctica 2</title>
</head>
<body>
    <h2>Inciso 4</h2>
    <br>
    <?php
    $a = 'PHP5 <br>';
    echo $GLOBALS["a"];
    $b = '5ta version de php <br>';
    echo $GLOBALS["b"];
    $c = $b*10;
    echo $GLOBALS["c"];
    $a .= $b;
    echo $GLOBALS["a"];
    $b *= $c;
    echo $GLOBALS["b"];
    $z[0] = 'MySQL <br>';
    echo $GLOBALS["z"];
    
    

    
    ?>
    </body>
    </html>