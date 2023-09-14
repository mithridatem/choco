<?php
    //import de l'autoloader des classes
    require_once './autoload.php';
    use App\Utils\BddConnect;
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/mvc/':
            include './home.php';
            break;
        case '/mvc/test':
            include './test.php';
            break;
        default:
            include './error.php';
            break;
    }
?>
