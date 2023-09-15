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
    //Méthodes
    //Ajouter un roles en BDD
    public function add(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles)VALUES(?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //Chercher un roles par son nom en BDD
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('SELECT id_roles, nom_roles FROM
            roles WHERE nom_roles = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Roles::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>