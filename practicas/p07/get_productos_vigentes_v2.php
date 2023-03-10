<?php
if(isset($_GET['tope'])) {
    $tope = $_GET['tope'];
} else {
    die('Parámetro "tope" no detectado...');
}

if (!empty($tope)) {
    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'alan250', 'marketzone');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

    /** comprobar la conexión */
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    /** Crear una tabla que no devuelve un conjunto de resultados */
    if ($result = $link->query("SELECT * FROM products WHERE eliminado = 0")) {
        /** Se extraen las tuplas obtenidas de la consulta */
        $row = $result->fetch_all(MYSQLI_ASSOC);

        /** Se crea un arreglo con la estructura deseada */
        foreach($row as $num => $registro) {
            foreach($registro as $key => $value) {
                $data[$num][$key] = $value;
            }
        }

        /** útil para liberar memoria asociada a un resultado con demasiada información */
        $result->free();
    }

    $link->close();
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
                <th scope="col">Actualizaciones</th>
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
                <?php if (mb_detect_encoding($row['detalles']) != "UTF-8") : ?>
                    <td><?= ($row['detalles']) ?></td>
                <?php else : ?>
                    <td><?= $row['detalles'] ?></td>
                <?php endif; ?>
                <td><img src=<?= $row['imagen'] ?> style="width: 60%;"></td>
                <td>
                    <form method="post" >
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="text" name="nombre" value="<?= $row['nombre'] ?>">
                        <input type="text" name="marca" value="<?= $row['marca'] ?>">
                        <input type="text" name="modelo" value="<?= $row['modelo'] ?>">
                        <input type="text" name="precio" value="<?= $row['precio'] ?>">
                        <input type="text" name="unidades" value="<?= $row['unidades'] ?>">
                        <input type="text" name="detalles" value="<?= $row['detalles'] ?>">
                        <input type="text" name="imagen" value="<?= $row['imagen'] ?>">
                        <input type="submit" value="Actualizar">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php endif; ?>