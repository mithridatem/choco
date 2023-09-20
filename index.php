<?php
    //import de l'autoloader des classes
    require_once './autoload.php';
    require_once './vendor/autoload.php';
    use App\Controller\UtilisateurController;
    use App\Controller\RolesController;
    use App\Controller\HomeController;
    use App\Controller\ChocoblastController;
    $userController = new UtilisateurController();  
    $rolesController = new RolesController();
    $homeController = new HomeController();   
    $chocoblastController = new ChocoblastController();  
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //version connecté
    if(isset($_SESSION['connected'])){
        //routeur
        switch ($path) {
            case '/mvc/':
                $homeController->getHome();
                break;
            case '/mvc/rolesadd':
                $rolesController->addRoles();
                break;
            case '/mvc/userdeconnexion':
                $userController->deconnexionUser();
                break;
            case '/mvc/chocoblastadd':
                $chocoblastController->addChocoblast();
                break;
            case '/mvc/chocoblastall':
                $chocoblastController->getAllChocoblast();
                break;
            default:
                $homeController->get404();
                break;
        }
    }
    else{
        switch ($path) {
            case '/mvc/':
                $homeController->getHome();
                break;
            case '/mvc/userconnexion':
                $userController->connexionUser();
                break;
            case '/mvc/useradd':
                $userController->addUser();
                break;
            case '/mvc/chocoblastall':
                $chocoblastController->getAllChocoblast();
                break;
            default:
                $homeController->get404();
                break;
        }
    }
?>
