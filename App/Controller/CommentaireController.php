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
        $choc = new Chocoblast();
        $choc->setId($_GET['id_chocoblast']);
        dd($choc->find());
        //variable à récupérer :
        //chocoblast  $_GET['id_chocoblast],
        //auteur $_SESSION['id']
        //tester si le chocoblast existe (find de chocoblast en passant la valeur $_GET['id_chocoblast])
            //tester si le formulaire est submit,
                //tester si les champs sont bien remplis
                    //ajouter le commentaire
                //Tester afficher un erreur les champs ne sont pas remplis
        //Tester si il n'existe pas afficher une erreur
        Template::render('navbar.php', 'Commenter', 'vueAddCommentary.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css']);
    }
}