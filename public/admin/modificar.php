<?php
session_start();

require '../../src/auxiliar.php';
$id = obtener_post('id');
$nombre = obtener_post('nombre');
$genero = obtener_post('genero');
$anyo = obtener_post('anyo');
$precio = obtener_post('precio');

$pdo = conectar();
$sent = $pdo->prepare("UPDATE peliculas 
                        SET nombre = :nombre, 
                        genero = :genero, 
                        anyo = :anyo, 
                        precio = :precio
                       WHERE id = :id");
$sent->execute([
    ':id' => $id,
    ':nombre' => $nombre,
    ':genero' => $genero,
    ':anyo' => $anyo,
    ':precio' => $precio
]);
$_SESSION['exito'] = "Película modificada con éxito.";
return volver_admin();
