<?php
namespace App\Model;
use App\Utils\BddConnect;
class Roles extends BddConnect{
    //Attributs
    private ?int $id_roles;
    private ?string $nom_roles;
    //constructeur
    //Getters et Setters
    public function getId():?int{
        return $this->id_roles;
    }
    public function setId(?int $id){
        $this->id_roles = $id;
    }
    public function getNom():?string{
        return $this->nom_roles;
    }
    public function setNom(?string $nom){
        $this->nom_roles = $nom;
    }
}
?>