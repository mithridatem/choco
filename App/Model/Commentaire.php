<?php
namespace App\Model;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Utils\BddConnect;
class Commentaire extends BddConnect{
    /*---------------------------------
                Attributs
    ---------------------------------*/
    private ?int $id_commentaire;
    private ?int $note_commentaire;
    private ?string $text_commentaire;
    private ?string $date_commentaire;
    private ?bool $statut_commentaire;
    private ?Utilisateur $auteur_commentaire;
    private ?Chocoblast $chocoblast_commentaire;
    /*---------------------------------
                Constructeur
    ---------------------------------*/
    public function __construct(){
        $this->auteur_commentaire = new Utilisateur();
        $this->chocoblast_commentaire = new Chocoblast();
    }
    /*---------------------------------
                Getters et Setters
    ---------------------------------*/
    public function getId():?int{
        return $this->id_commentaire;
    }
    public function setId(?int $id){
        $this->id_commentaire = $id;
    }
    public function getNote():?int{
        return $this->note_commentaire;
    }
    public function setNote(?int $note){
        $this->note_commentaire = $note;
    }
    public function getText():?string{
        return $this->text_commentaire;
    }
    public function setText(?string $text){
        $this->text_commentaire = $text;
    }
    public function getDate():?string{
        return $this->date_commentaire;
    }
    public function setDate(?string $date){
        $this->date_commentaire = $date;
    }
    public function getStatut():?bool{
        return $this->statut_commentaire;
    }
    public function setStatut(?bool $statut){
        $this->statut_commentaire = $statut;
    }
    public function getAuteur():?Utilisateur{
        return $this->auteur_commentaire;
    }
    public function setAuteur(?Utilisateur $auteur){
        $this->auteur_commentaire = $auteur;
    }
    public function getChocoblast():?Chocoblast{
        return $this->chocoblast_commentaire;
    }
    public function setChocoblast(?Chocoblast $chocoblast){
        $this->chocoblast_commentaire = $chocoblast;
    }
    /*---------------------------------
                Méthodes
    ---------------------------------*/
    public function add(){
        try {
            $note = $this->note_commentaire;
            $text = $this->text_commentaire;
            $date = $this->date_commentaire;
            $statut = $this->statut_commentaire;
            $auteur = $this->auteur_commentaire->getId();
            $chocoblast = $this->chocoblast_commentaire->getId();
            $req = $this->connexion()->prepare('INSERT INTO commentaire(
                note_commentaire, text_commentaire, date_commentaire, statut_commentaire,
                auteur_commentaire, id_chocoblast) VALUES(?,?,?,?,?,?)');
            $req->bindParam(1, $note, \PDO::PARAM_INT);
            $req->bindParam(2, $text, \PDO::PARAM_STR);
            $req->bindParam(3, $date, \PDO::PARAM_STR);
            $req->bindParam(4, $statut, \PDO::PARAM_BOOL);
            $req->bindParam(5, $auteur, \PDO::PARAM_INT);
            $req->bindParam(6, $chocoblast, \PDO::PARAM_INT);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findBy(){
        try {
            $id = $this->getChocoblast()->getId();
            $req = $this->connexion()->prepare('SELECT id_commentaire, text_commentaire,
            note_commentaire, date_commentaire, prenom_utilisateur, nom_utilisateur, id_chocoblast FROM commentaire
            INNER JOIN utilisateur  ON commentaire.auteur_commentaire = utilisateur.id_utilisateur
            WHERE id_chocoblast = ?');
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Commentaire::class);
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}