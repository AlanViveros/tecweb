<?php
require_once 'Productos.php';
require_once 'Database.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $producto = new Productos('marketzone');
    $producto->delete($id);
    echo $producto->getResponse();
}
?>
