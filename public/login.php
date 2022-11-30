<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <?php
    require_once '../src/auxiliar.php';
    
    // OBTENEMOS LOS VALORES DE LOS INPUTS
    $nombre = obtener_post('usuario');
    $password = obtener_post('password');
    $error = false;
    $clase_label = '';
    $clase_input = '';

    // COMPROBAMOS QUE EL CAMPO DE USUARIO Y LA CONTRASEÑA NO ESTÉN
    // VACIOS. DE SER ASÍ, COMPROBAMOS QUE EXISTAN EN LA BASE DE DATOS,
    // DANDO LUGAR A QUE INICIEMOS SESIÓN CON DICHO USUARIO.
    if (isset($nombre, $password)) {
        if ($usuario = \App\Tablas\Usuario::comprobar($nombre, $password)) {
            // EL USUARIO SE LOGUEA EN LA WEB.
            $_SESSION['login'] = serialize($usuario);
            // En caso de ser admin, se loguea en el panel de admin. En caso contrario,
            // es redirigido al panel de usuario.
            $_SESSION['exito'] = '¡BIENVENIDO DE NUEVO!';
            return $usuario->es_admin() ? volver_admin() : volver();
        } else {
            // Mostrar error de validación
            $error = true;
            $clases_label = "text-red-700 dark:text-red-500";
            $clases_input = "bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400";
        }
    }

    ?>
    <?php require '../src/_menu.php' ?>
    <?php require '../src/_alerts.php' ?>
    <div class="container mx-auto flex items-center justify-center">
        <form action="" method="POST">
            <div class="mb-6">
                <label for="usuario" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white <?= $clases_label ?>">Nombre de usuario</label>
                <input type="text" name="usuario" id="usuario" class="<?= $clases_input ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white <?= $clases_label ?>">Contraseña</label>
                <input type="password" name="password" id="password" class="<?= $clases_input ?> bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <?php if ($error) : ?>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-bold">¡Error!</span> Nombre de usuario o contraseña incorrectos</p>
                <?php endif ?>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <script defer src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>