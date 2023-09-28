<?php
namespace App\Controller;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Model\Commentaire;
use App\vue\Template;
use App\Utils\Utilitaire;
class CommentaireController extends Commentaire{
    public function addCommentaire(){
        $error = "";
        $date = new \DateTimeImmutable();
        dd($date);
        Template::render('navbar.php', 'Commenter', 'vueAddCommentary.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css']);
    }
}