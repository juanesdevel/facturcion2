<?php
$dbname="if0_37356103_facturacion";
$dbuser="if0_37356103";
$dbpass="ethcD8Mbw2J";
$dbhost="sql311.infinityfree.com";

$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>