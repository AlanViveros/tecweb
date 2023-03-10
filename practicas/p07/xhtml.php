<?php
// Verificar si se han recibido los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['precio']) && isset($_POST['detalles']) && isset($_POST['unidades']) && isset($_POST['imagen'])) {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    // Crear un arreglo con los datos
    $data = array(
        array(
            'id' => 1,
            'nombre' => $nombre,
            'marca' => $marca,
            'modelo' => $modelo,
            'precio' => $precio,
            'unidades' => $unidades,
            'detalles' => $detalles,
            'imagen' => $imagen
        )
    );
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>PRODUCTO</h3>
    <br/>
    <?php if (isset($data)) : ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['marca'] ?></td>
                        <td><?= $row['modelo'] ?></td>
                        <td><?= $row['precio'] ?></td>
                        <td><?= $row['unidades'] ?></td>
                        <td><?= utf8_encode($row['detalles']) ?></td>
                        <td><img src=<?= $row['imagen'] ?>></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
