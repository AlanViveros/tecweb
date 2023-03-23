<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if(!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // SE VERIFICA SI EL PRODUCTO YA EXISTE EN LA BD
    $nombre = $jsonOBJ->nombre;
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM products WHERE nombre = ? AND eliminado = 0');
    $stmt->execute([$nombre]);
    $result = $stmt->fetchColumn();

    if($result > 0) {
        echo '[SERVIDOR] Error: El producto ya existe en la base de datos.';
    } else {
        // SE INSERTA EL NUEVO PRODUCTO EN LA BD
        $descripcion = $jsonOBJ->descripcion;
        $precio = $jsonOBJ->precio;
        $stmt = $pdo->prepare('INSERT INTO products (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen]);

        echo '[SERVIDOR] Éxito: El producto ha sido insertado correctamente en la base de datos.';
    }
}
?>
