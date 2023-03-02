<?php
$nombre = $_POST["nombre"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$detalles = $_POST["detalles"];
$unidades = $_POST["unidades"];
$imagen = $_POST["imagen"];

// Crear el objeto de conexión
@$link = new mysqli('localhost', 'root', 'alan250', 'marketzone');

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

// Verificar si ya existe un registro con la misma marca y modelo
$sql = "SELECT * FROM products WHERE marca = ? AND modelo = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("ss",$marca, $modelo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Ya existe un registro con la misma marca y modelo
    echo "Error: Ya existe un producto con la misma marca y modelo en la base de datos.";
} else {
    // No existe un registro con la misma marca y modelo, insertar el nuevo producto
    $sql = "INSERT INTO products VALUES (null,'{$nombre}', '{$marca}', '{$modelo}', '{$precio}', '{$detalles}', '{$unidades}', '{$imagen}', 0)";

// Ejecutar la consulta SQL
if ($link->query($sql) === TRUE) {
echo "El producto se registró correctamente.";
} else {
echo "Error al insertar producto";
}
}

// Cerrar la conexión
$link->close();

?>