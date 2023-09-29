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
        Template::render('navbar.php', 'footer.php','vueAddChocoblast.php','Chocoblast',   
        ['script.js', 'main.js'],['style.css', 'main.css'],$error,$users);
    }
    public function getAllChocoblast(){
        $error = "";
        $chocos = $this->findAll();
        if(empty($chocos)){
            $error = "Il n'y à pas de chocoblasts sur le site";
        }
        Template::render('navbar.php','footer.php','vueAllChocoblast.php','Tous les Chocoblasts', 
        ['script.js', 'main.js'],['style.css', 'main.css'],$error,$chocos);
    }
    public function updateChocoblast(){
        $error ="";
        $user = new Utilisateur();
        $user->setId(Utilitaire::cleanInput($_SESSION['id']));
        $users = $user->findAll();
        //tableau $data que l'on passe à la vue
        $data = [];
        $data[0]= $users;
        //Tester si les paramètres $_GET['id_chocoblast'] et $_GET['auteur_id'] existes
        if(isset($_GET['id_chocoblast']) AND isset($_GET['auteur_id'])){
            if(!empty($_GET['id_chocoblast']) AND !empty($_GET['auteur_id'])){
                $this->setId(Utilitaire::cleanInput($_GET['id_chocoblast']));
                $choco = $this->find();
                //test si le chocoblast existe
                if($choco){
                    //injection des valeurs du chocoblast dans le tableau $data que l'on passe à la vue
                    $data[1] = $choco;
                    //test si le formulaire est submit
                    if(isset($_POST['submit'])){
                        //test si tous les champs sont bien remplis
                        if(!empty($_POST['slogan_chocoblast']) AND !empty($_POST['date_chocoblast']) 
                        AND !empty($_POST['cible_chocoblast'])){
                            $slogan = Utilitaire::cleanInput($_POST['slogan_chocoblast']);
                            $date = Utilitaire::cleanInput($_POST['date_chocoblast']);
                            $cible = Utilitaire::cleanInput($_POST['cible_chocoblast']);
                            $this->setSlogan($slogan);
                            $this->setdate($date);
                            $this->getCible()->setId($cible);
                            $this->getAuteur()->setId($_SESSION['id']);
                            $this->update();
                            $error = "Le chocoblast a été mis jour";
                        }
                        //test les champs ne sont pas remplis
                        else{
                            $error = "Veuillez remplir tous les champs du formulaire";
                        }
                    }
                }
                //test le chocoblast n'existe pas
                else{
                    $error = "Le chocoblast n'existe pas";
                }
            }
            //Test les valeurs de paramètres $_GET sont vides
            else{
                $error = "Les valeurs des paramètres sont vides";
            } 
        }
        //Test les paramètres $_GET sont invalides
        else{
            $error = "Les paramètres sont invalides";
        }
        Template::render('navbar.php','footer.php','vueUpdateChocoblast.php','mise à jour chocoblast', 
        ['script.js', 'main.js'],['style.css', 'main.css'],$error,$data);
    }
    public function filterChocoblast(){
        $error = "";
        $chocos = $this->filterAll(5);
        if($chocos){
            if(isset($_POST['submit'])){
                if(!empty($_POST['filter'])){
                    $chocos = $this->filterAll(Utilitaire::cleanInput($_POST['filter']));
                }
            }
        }
        else{
            $error = "La liste des chocoblast est vide ";
        }
        Template::render('navbar.php','footer.php','vueFilterAllChocoblast.php','Filtrer chocoblasts', 
        ['script.js', 'main.js'], ['style.css', 'main.css'],$error, $chocos);
    }
}