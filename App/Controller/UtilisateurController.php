<?php
namespace App\Controller;
use App\Model\Utilisateur;
class UtilisateurController extends Utilisateur{
    public function addUser(){
        $error = "";
        include './App/Vue/vueAddUser.php';
    }
}