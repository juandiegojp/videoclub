<?php 

function conectar()
{
    return new \PDO('pgsql:host=localhost,dbname=club', 'club', 'club');
}

function volver() {
    return header('Location: /');
}

function volver_admin() {
    return header('Location: /admin');
}

function obtener_post($par)
{
    return obtener_parametro($par, $_POST);
}

function obtener_parametro($par, $array)
{
    return isset($array[$par]) ? trim($array[$par]) : null;
}