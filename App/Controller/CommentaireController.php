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
        //test si le paramètre $_GET['id_chocoblast'] si il existe
        if(isset($_GET['id_chocoblast'])){
            //test si le paramètre $_GET['id_chocoblast'] si il est différent de vide
            if(!empty($_GET['id_chocoblast'])){
                $choc = new Chocoblast();
                $choc->setId($_GET['id_chocoblast']);
                //test si le chocoblast existe
                if($choc->find()){
                    //test si le formulaire est submit
                    if(isset($_POST['submit'])){
                        //test si le formulaire est rempli
                        if(!empty($_POST['text_commentaire'])){
                            $date = new \DateTimeImmutable();
                            //setter la date
                            $this->setDate($date->format('Y-m-d'));
                            $this->setText(Utilitaire::cleanInput($_POST['text_commentaire']));
                            $this->setNote(Utilitaire::cleanInput($_POST['note_commentaire']));
                            $this->setStatut(false);
                            $this->getAuteur()->setId(Utilitaire::cleanInput($_SESSION['id']));
                            $this->getChocoblast()->setId(Utilitaire::cleanInput($_GET['id_chocoblast']));
                            //ajout du commentaire
                            $this->add();
                            $error = "Le commentaire à été ajouté";
                        }
                        //test si les champs ne sont pas remplis
                        else{
                            $error = "Veuillez remplir tous les champs du formulaire";
                        }
                    }
                }
                //test le chocoblast n'existe pas
                else{
                    header('location: ./chocoblastfilter');
                }
            }
            //test si le paramètre $_GET['id_chocoblast] est vide
            else{
                header('location: ./chocoblastfilter');
            }
        }
        //test si le paramètre $_GET['id_chocoblast] n'existe pas
        else{
            header('location: ./chocoblastfilter');
        }
        Template::render('navbar.php', 'footer.php', 'vueAddCommentary.php','Commenter',   
        ['script.js', 'main.js'], ['style.css', 'main.css'],$error);
    }
    public function allCommentaire(){
        $error = "";
        $commentaires = [];
        if(isset($_GET['id_chocoblast'])){
            if(!empty($_GET['id_chocoblast'])){
                $this->getChocoblast()->setId(Utilitaire::cleanInput($_GET['id_chocoblast']));
                $commentaires = $this->findBy();
                if(empty($commentaires)){
                    $error = "il n'y a pas de commentaire";
                    header("Refresh:2; url=./chocoblastfilter");
                }
            }else{
                header('location: ./chocoblastfilter');
            }
        }else{
            header('location: ./chocoblastfilter');
        }
        Template::render('navbar.php', 'footer.php', 'vueAllCommentary.php','Commenter',   
        ['script.js', 'main.js'], ['style.css', 'main.css'],$error, $commentaires);
    }
}