<?php 

require '../../src/auxiliar.php';

$id = $_POST['id'];

$pdo = conectar();
$sent = $pdo->prepare('DELETE FROM peliculas WHERE id = :id');
$sent->execute([':id' => $id]);

return volver_admin();