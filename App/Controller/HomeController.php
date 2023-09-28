<?php
namespace App\Controller;
use App\Utils\Messagerie;
use App\vue\Template;
class HomeController{
    public function getHome(){
        $error = "";
        Template::render('navbar.php','footer.php', 'vueHome.php','Accueil', 
        ['script.js', 'main.js'], ['style.css', 'main.css'],$error);
    }
    public function get404(){
        $error = "";
        Template::render('navbar.php','footer.php','vueError.php','Error 404',  
        ['script.js'], ['style.css'],$error);
    }
    public function get401(){
        $error = "";
        Template::render('navbar.php','footer.php','vueNoRight.php','Error 401', 
        ['script.js'], ['style.css'],$error);
    }
    public function testMail(){
        Messagerie::sendEmail('mathieumithridate@adrar-formation.com','exemple de mail', 'test d\'envoi depuis chocoblast');
    }
}
?>