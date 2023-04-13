<?php
require_once 'Productos.php';
require_once 'DataBase.php';

// Crea una instancia de la clase Productos
$productos = new Productos('marketzone');
// Imprime la respuest
$productos->list();
echo $productos->getResponse();


?>




