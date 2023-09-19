<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Utilisateur;
class Chocoblast extends BddConnect{
    /*---------------------------- 
                Attributs
    -----------------------------*/
    private ?int $id_chocoblast;
    private ?string $slogan_chocoblast;
    private ?string $date_chocoblast;
    private ?bool $statut_chocoblast;
    private ?Utilisateur $cible_chocoblast; 
    private ?Utilisateur $auteur_chocoblast;
    /*---------------------------- 
            Constructeur
    -----------------------------*/
    public function __construct(){
        $this->cible_chocoblast = New Utilisateur();
        $this->auteur_chocoblast = New Utilisateur();
    }
    /*---------------------------- 
            Getters et Setters
    -----------------------------*/
    public function getId():?int{
        return $this->id_chocoblast;
    }
    public function setId(?int $id):void{
        $this->id_chocoblast = $id;
    }
    public function getSlogan():?string{
        return $this->slogan_chocoblast;
    }
    public function setSlogan(?string $slogan):void{
        $this->slogan_chocoblast = $slogan;
    }
    public function getDate():?string{
        return $this->date_chocoblast;
    }
    public function setdate(?string $date):void{
        $this->date_chocoblast = $date;
    }
    public function getStatut():?bool{
        return $this->statut_chocoblast;
    }
    public function setStatut(?bool $statut):void{
        $this->statut_chocoblast = $statut;
    }
    public function getCible():?Utilisateur{
        return $this->cible_chocoblast;
    }
    public function setCible(?Utilisateur $cible):void{
        $this->cible_chocoblast = $cible;
    }
    public function getAuteur():?Utilisateur{
        return $this->auteur_chocoblast;
    }
    public function setAuteur(?Utilisateur $auteur):void{
        $this->auteur_chocoblast = $auteur;
    }
    /*---------------------------- 
                Méthode
    -----------------------------*/
    private function add(){
        try {
            $slogan = $this->getSlogan();
            $date = $this->getDate();
            $statut = $this->getStatut();
            $cible = $this->getCible()->getId();
            $auteur = $this->getAuteur()->getId();
            $req = $this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast,
            date_chocoblast, statut_chocoblast, cible_chocoblast, auteur_chocoblast)
            VALUES (?,?,?,?,?)');
            $req->bindParam(1, $slogan, \PDO::PARAM_STR);
            $req->bindParam(2, $date, \PDO::PARAM_STR);
            $req->bindParam(3, $statut, \PDO::PARAM_BOOL);
            $req->bindParam(4, $cible, \PDO::PARAM_INT);
            $req->bindParam(5, $auteur, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error :'.$e->getMessage());
        } 
    }
}