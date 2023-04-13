<?php
require_once 'Productos.php';
require_once 'DataBase.php';

$dbName = 'marketzone';
$productos = new Productos($dbName);

// Se obtiene la información del producto enviado por el cliente
$task = file_get_contents('php://input');

$jsonOBJ = json_decode($task);

// Se llama a la función add() de la clase Productos para agregar el producto
$productos->add($jsonOBJ->nombre, $jsonOBJ->marca, $jsonOBJ->modelo, $jsonOBJ->precio, $jsonOBJ->detalles, $jsonOBJ->unidades, $jsonOBJ->imagen);

// Se devuelve la respuesta al cliente
echo $productos->getResponse();

?>