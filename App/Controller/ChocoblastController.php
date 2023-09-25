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
        $user->setId(Utilitaire::cleanInput($_SESSION['id']));
        $users = $user->findAll();
        if(isset($_POST['submit'])){
            if(!empty($_POST['slogan_chocoblast']) AND !empty($_POST['date_chocoblast']) 
            AND !empty($_POST['cible_chocoblast'])){
                $this->setSlogan(Utilitaire::cleanInput($_POST['slogan_chocoblast']));
                $this->setDate(Utilitaire::cleanInput($_POST['date_chocoblast']));
                $this->getCible()->setId(Utilitaire::cleanInput($_POST['cible_chocoblast']));
                $this->getAuteur()->setId(Utilitaire::cleanInput($_SESSION['id']));
                $this->setStatut(false);
                $choco = $this->findOneBy();
                if($choco){
                    $error = "Le chocoblast existe déja";
                }
                else{
                    $this->add();
                    $error = "Le chocoblast a été ajouté en BDD";
                }
            }
            else{
                $error = "Veuillez remplir tous les champs du formulaire";
            }
        }
        Template::render('navbar.php', 'Chocoblast', 'vueAddChocoblast.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css'], $users);
    }
    public function getAllChocoblast(){
        $error = "";
        $chocos = $this->findAll();
        if(empty($chocos)){
            $error = "Il n'y à pas de chocoblasts sur le site";
        }
        Template::render('navbar.php', 'Tous les Chocoblasts', 'vueAllChocoblast.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css'], $chocos);
    }
    public function updateChocoblast(){
        $error ="";
        $user = new Utilisateur();
        $user->setId(Utilitaire::cleanInput($_SESSION['id']));
        $users = $user->findAll();
        //Tester si les paramètres $_GET['id_chocoblast'] et $_GET['auteur_id'] existes
            //Tester si les 2 paramètres GET ne sont pas vides
                //Tester si auteur_id est égal à $_SESSION['id'] (vérifier si on est l'auteur)
                    //Setter l' id à $this $this->setId($_GET['id_chocoblast'])
                    //Tester si le chocoblast existe avec la fonction find
                        //Tester si le formulaire est submit
                            //tester si tous les champs sont bien remplis
                                //mettre à jour le chocoblat avec la méthode Update
        Template::render('navbar.php', 'mise à jour chocoblast', 'vueAddChocoblast.php', 'footer.php', 
        $error, ['script.js', 'main.js'], ['style.css', 'main.css'], $users);
    }
}