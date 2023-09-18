<?php
namespace App\Controller;
use App\Model\Utilisateur;
use App\Utils\Utilitaire;
use App\vue\Template;
class UtilisateurController extends Utilisateur{
    public function addUser(){
        $error = "";
        //tester si le formulaire
        if(isset($_POST['submit'])){
            //test si les champs sont remplis
            if(!empty($_POST['nom_utilisateur']) AND !empty($_POST['prenom_utilisateur']) 
            AND !empty($_POST['mail_utilisateur']) AND !empty($_POST['password_utilisateur']) 
            AND !empty($_POST['repeat_password_utilisateur'])){
                //Test si les mots de passe correspondent
                if($_POST['password_utilisateur']==$_POST['repeat_password_utilisateur']){
                    //setter les valeurs à l'objet UtilisateurController
                    $this->setNom(Utilitaire::cleanInput($_POST['nom_utilisateur']));
                    $this->setPrenom(Utilitaire::cleanInput($_POST['prenom_utilisateur']));
                    $this->setMail(Utilitaire::cleanInput($_POST['mail_utilisateur']));
                    //tester si le compte existe
                    if(!$this->findOneBy()){
                        if($_FILES['image_utilisateur']['tmp_name'] != ""){
                            $ext = Utilitaire::getFileExtension($_FILES['image_utilisateur']['name']);
                            if($ext=='png' OR $ext =='PNG' OR $ext = 'jpg' OR $ext =='JPG'OR $ext =='jpeg' OR $ext == 'JPEG' OR $ext=='bmp' OR $ext=='BMP'){
                                $this->setImage($_FILES['image_utilisateur']['name']);
                                move_uploaded_file($_FILES['image_utilisateur']['tmp_name'], './Public/asset/images/'.$_FILES['image_utilisateur']['name']);
                            }
                            else{
                                $error = 'format incorrect';
                                $this->setImage('test.png');
                            }
                        }
                        else{
                            $this->setImage('test.png');
                        }
                        $this->setStatut(false);
                        //hashser le mot de passe
                        $this->setPassword(password_hash(Utilitaire::cleanInput($_POST['password_utilisateur']), PASSWORD_DEFAULT));
                        //Ajouter le compte en BDD
                        $this->add();
                        $error = "Le compte a été ajouté en BDD";
                    }    
                    else{
                        $error = "Le compte existe déja";
                    }
                }else{
                    $error = "Les mots de passe ne correspondent pas";
                }
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        Template::render('navbar.php', 'Inscription', 'vueAddUser.php', 'footer.php');
        //include './App/Vue/vueAddUser.php';
    }
    public function connexionUser()
    {   
        $error ="";
        //tester si le formulaire est submit
        if(isset($_POST['submit'])){
            //tester si les champs sont remplis
            if(!empty($_POST['mail_utilisateur']) AND !empty($_POST['password_utilisateur'])){
                //tester si le compte existe (findOneBy du model)
                $this->setMail(Utilitaire::cleanInput($_POST['mail_utilisateur']));
                $user = $this->findOneBy();
                if($user){
                    //tester si le mot de passe correspond (password_verify)
                    if(password_verify(Utilitaire::cleanInput($_POST['password_utilisateur']), $user->getPassword())){
                        $error = "Connecté";
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['nom'] = $user->getNom();
                        $_SESSION['prenom'] = $user->getPrenom();
                        $_SESSION['image'] = $user->getImage();
                    }else {
                        $error = "Les informations de connexion ne sont pas valides";
                    }
                }else{
                    $error = "Les informations de connexion ne sont pas valides";
                }
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        Template::render('navbar.php', 'Inscription', 'vueConnexionUser.php', 'footer.php');
        //include './App/Vue/vueConnexionUser.php';
    }
    public function exemple(){
        $error ="";
        Template::render('navbar.php', 'Inscription', 'vueAddUser.php', 'footer.php');
    }
    public function deconnexionUser(){
        unset($_COOKIE['PHPSESSID']);
        session_destroy();
        header('Location: ./');
    }
}