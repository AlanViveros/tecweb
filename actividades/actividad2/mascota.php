<?php

namespace Mascotas;

class Mascota {
    private $nombre;
    private $raza;
    private $edad;
    private $peso;

    public function __construct($nombre, $raza, $edad, $peso) {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->peso = $peso;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function mostrarInfo() {
        echo '<ul>';
        echo '<li>Nombre: ' . $this->nombre . '</li>';
        echo '<li>Raza: ' . $this->raza . '</li>';
        echo '<li>Edad: ' . $this->edad . '</li>';
        echo '<li>Peso: ' . $this->peso . '</li>';
        echo '</ul>';
    }
}

class Mascota2 extends Mascota {
    private $foto;

    public function __construct($nombre, $raza, $edad, $peso, $foto) {
        parent::__construct($nombre, $raza, $edad, $peso);
        $this->foto = $foto;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function mostrarInfo() {
        parent::mostrarInfo();
        echo '<img src="' . $this->foto . '">';
    }
}

?>
