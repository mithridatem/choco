<?php
namespace App\Controller;
use App\Model\Utilisateur;
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
                    $this->setNom($_POST['nom_utilisateur']);
                    $this->setPrenom($_POST['prenom_utilisateur']);
                    $this->setMail($_POST['mail_utilisateur']);
                    //tester si le compte existe
                    if(!$this->findOneBy()){
                        //hashser le mot de passe
                        $this->setPassword(password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT));
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
        include './App/Vue/vueAddUser.php';
    }
}