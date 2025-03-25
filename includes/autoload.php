<?php




spl_autoload_register(function ($nombre_clase) {

    $dirs = [MODELS_FOLDER, CONTROLLERS_FOLDER, REPOSITORIES_FOLDER, ENTITIES_FOLDER, SERVICES_FOLDER, INCLUDES_FOLDER, TRAITS_FOLDER];

    foreach ($dirs as $dir) {
        $ruta = dirname(__DIR__) . '\\' . $dir . '\\' . $nombre_clase . '.php';
        existsRuta($ruta);
    }

    //Si no se encuentran los elementos dentro de las carpetas, probamos desde el directorio contenedor del proyecto
    $ruta = dirname(__DIR__) . '\\' . $nombre_clase . '.php';

    existsRuta($ruta);


});

function existsRuta(string $ruta)
{
    $ruta = str_replace("\\", DIRECTORY_SEPARATOR, $ruta);


    //echo $ruta."<br/>";
    if (file_exists($ruta)) {
        require_once $ruta;
        return;
    }
}


