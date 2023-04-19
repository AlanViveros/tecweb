<?php
require_once 'Productos.php';
require_once 'DataBase.php';
   // Crear instancia de la clase Productos
$productos = new Productos('marketzone');

// Verificar si se recibió el parámetro de búsqueda
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Realizar la búsqueda utilizando la función search de la clase Productos
    $productos->search($search);
    // Obtener la respuesta y mostrarla como JSON
    echo $productos->getResponse();
}

?>
