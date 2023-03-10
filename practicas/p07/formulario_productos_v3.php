<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Actualizacion de Productos</title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Actualizacion de Productos</h1>
	<?php
	// Conectar con la base de datos
	$link = mysqli_connect("localhost", "root", "alan250", "marketzone");

	// Comprobar la conexión
	if($link === false){
	    die("ERROR: No se pudo conectar con la base de datos. " . mysqli_connect_error());
	}

	// Procesar el envío del formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Recuperar los valores enviados desde el formulario
		$id = $_POST["id"];
		$nombre = $_POST["nombre"];
		$marca = $_POST["marca"];
		$modelo = $_POST["modelo"];
		$precio = $_POST["precio"];
		$detalles = $_POST["detalles"];
		$unidades = $_POST["unidades"];
		$imagen = $_POST["imagen"];

		if (!$link->query("UPDATE products SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades', imagen='$imagen' WHERE id='$id'")) {
			echo "Error al actualizar el producto: " . mysqli_error($link);
		}
		 
	$link->close();
}
?>
<form method="POST" onsubmit="return validarFormulario()">
<label for="id">ID:</label>
<input type="text" id="id" name="id" ><br><br>
	<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required maxlength="100"><br><br>

<label for="marca">Marca:</label>
<select type="text" id="marca" name="marca" required>
	<option value="">Seleccione una opción</option>
	<option value="Xiaomi">Xiaomi</option>
	<option value="Samsung">Samsung</option>
	<option value="Apple">Apple</option>
	<option value="Huawei">Huawei</option>
	<option value="OPPO">OPPO</option>
	<option value="Honor">Honor</option>
	<option value="POCO">POCO</option>
</select><br><br>

<label for="modelo">Modelo:</label>
<input type="text" id="modelo" name="modelo" required maxlength="25"><br><br>

<label for="precio">Precio:</label>
<input type="number" id="precio" name="precio" required min="100" step="0.01"><br><br>

<label for="detalles">Detalles:</label>
<textarea id="detalles" name="detalles" maxlength="250"></textarea><br><br>

<label for="unidades">Unidades:</label>
<input type="number" id="unidades" name="unidades" required min="0"><br><br>

<label for="imagen">Imagen:</label>
<input type="text" id="imagen" name="imagen"><br><br>
	
	<input type="submit" value="Actualizar">
</form>
<br>

<script>
  function validarFormulario() {
	var nombre = document.getElementById("nombre").value;
	var marca = document.getElementById("marca").value;
	var modelo = document.getElementById("modelo").value;
	var precio = document.getElementById("precio").value;
	var detalles = document.getElementById("detalles").value;
	var unidades = document.getElementById("unidades").value;
	var imagen = document.getElementById("imagen");
	var errores = "";

	if (nombre.length === 0 || nombre.length > 100) {
	  alert("El nombre debe tener entre 1 y 100 caracteres.");
	  return false;
	}

	if (marca === "") {
	  alert("Debe seleccionar una marca.");
	  return false;
	}

	if (modelo.length === 0 || modelo.length > 25) {
	  alert("El modelo debe tener entre 1 y 25 caracteres.");
	  return false;
	}

	if (precio <= 99.99) {
	  alert("El precio debe ser mayor a 99.99.");
	  return false;
	}

	if (detalles.length > 250) {
	  alert("Los detalles no pueden tener más de 250 caracteres.");
	  return false;
	}

	if (unidades < 0) {
	  alert("Las unidades no pueden ser negativas.");
	  return false;
	}

	imagen.defaultValue = "img/img.jpg";

	return true;
  }
</script>
</body>
</html>