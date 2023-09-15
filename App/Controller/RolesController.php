<?php
namespace App\Controller;
use App\Model\Roles;
use App\Utils\Utilitaire;
class RolesController extends Roles{
    public function addRoles(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['nom_roles'])){
                $this->setNom(Utilitaire::cleanInput($_POST['nom_roles']));
                if(!$this->findOneBy()){
                    $this->add();
                    $error = "Le roles a été ajouté en BDD";
                }else{
                    $error = "Le roles existe déja";
                }
            }
            else{
                $error = "Veuillez saisir le nom du roles";
            }
        }
        include './App/Vue/vueAddRoles.php';
    }
}