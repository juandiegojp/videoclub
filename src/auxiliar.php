<?php
require '../vendor/autoload.php';

function conectar()
{
    return new \PDO('pgsql:host=localhost,dbname=club', 'club', 'club');
}

function volver()
{
    header('Location: /index.php');
}

function volver_admin()
{
    header("Location: /admin/");
}

function obtener_post($par)
{
    return obtener_parametro($par, $_POST);
}

function obtener_parametro($par, $array)
{
    return isset($array[$par]) ? trim($array[$par]) : null;
}

function hh($x)
{
    return htmlspecialchars($x ?? '', ENT_QUOTES | ENT_SUBSTITUTE);
}

function dinero($s)
{
    return number_format($s, 2, ',', ' ') . ' €';
}
