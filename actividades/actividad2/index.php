<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'mascota.php';

    use Mascotas\Mascota;
    use Mascotas\Mascota2;

    $mascota1 = new Mascota('Princesa', 'Rottweiler', 4, 15);
    $mascota2 = new Mascota('Caramelo', 'Pitbull', 2, 25);
    $mascota3 = new Mascota2('Che', 'Schnauzer', 3, 12, 'foto/perro.jpg');
    
    $mascota1->mostrarInfo();
    $mascota2->mostrarInfo();
    $mascota3->mostrarInfo();
?>

</body>
</html>