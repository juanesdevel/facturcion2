<?php
$dbname="facturacion";
$dbuser="root";
$dbpass="";
$dbhost="localhost";

$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>