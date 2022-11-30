<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function cambiar(el, id) {
            el.preventDefault();
            const oculto = document.getElementById('oculto');
            oculto.setAttribute('value', id);
        }

        function cambiarModificar(el, id) {
            el.preventDefault();
            const ocultoModificar = document.getElementById('ocultoModificar');
            ocultoModificar.setAttribute('value', id);
        }
    </script>
    <link href="/css/output.css" rel="stylesheet">
    <title>Portal</title>
</head>

<body>
    <?php
    require_once('../../vendor/autoload.php');
    require '../../src/auxiliar.php';
    require_once '../../src/_menu.php';
    require_once '../../src/_modales.php';
    require_once '../../src/_alerts.php';
    $pdo = conectar();
    $sent = $pdo->query('SELECT * FROM peliculas ORDER BY genero');

    ?>
    <button data-modal-toggle="insertar" href="/admin/insertar.php" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Insertar nueva película
        </span>
    </button>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Título
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Año
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Género
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Precio
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $fila['nombre'] ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= $fila['anyo'] ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $fila['genero'] ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $fila['precio'] ?>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <?php $fila_id = $fila['id'] ?>
                            <form action="/admin/modificar.php" method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $fila_id ?>">
                                <button type="submit" onclick="cambiarModificar(event, <?= $fila_id ?>)" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900" data-modal-toggle="modificar">
                                    Editar
                                </button>
                            </form>
                            <form action="/admin/eliminar.php" method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $fila_id ?>">
                                <button type="submit" onclick="cambiar(event, <?= $fila_id ?>)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" data-modal-toggle="popup-modal">
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>