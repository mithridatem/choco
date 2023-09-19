<?php
namespace App\Controller;
use App\vue\Template;
use App\Model\Utilisateur;
use App\Utils\Utilitaire;
use App\Model\Chocoblast;
class ChocoblastController extends Chocoblast{
    public function addChocoblast(){
        $error ="";
        $user = new Utilisateur();
        $users = $user->findAll();
        Template::render('navbar.php', 'Inscription', 'vueConnexionUser.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css'], $users);
    }
}