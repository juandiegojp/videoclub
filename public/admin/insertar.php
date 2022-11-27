<?php
session_start();

require '../../src/auxiliar.php';

$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$anyo = $_POST['anyo'];
$precio = $_POST['precio'];

$pdo = conectar();
$sent = $pdo->prepare('INSERT INTO peliculas (nombre, genero, anyo, precio) VALUES (:nombre, :genero, :anyo, :precio)');
$sent->execute([
    ':nombre' => $nombre,
    ':genero' => $genero,
    ':anyo' => $anyo,
    ':precio' => $precio
]);
$_SESSION['exito'] = "Película añadida con éxito.";
return volver_admin();