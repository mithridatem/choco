<?php
namespace App\Controller;
use App\vue\Template;
class HomeController{
    public function getHome(){
        $error = "";
        Template::render('navbar.php', 'Accueil', 'vueHome.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css']);
    }
    public function get404(){
        $error = "";
        Template::render('navbar.php', 'Error 404', 'vueError.php', 'footer.php', 
        $error, ['script.js'], ['style.css']);
    }
}
?>