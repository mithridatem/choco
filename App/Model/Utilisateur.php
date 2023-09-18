<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Roles;
class Utilisateur extends BddConnect{
    //attributs
    private ?int $id_utilisateur;
    private ?string $nom_utilisateur;
    private ?string $prenom_utilisateur;
    private ?string $mail_utilisateur;
    private ?string $password_utilisateur;
    private ?string $image_utilisateur;
    private bool $statut_utilisateur;
    private Roles $roles;
    //constructeur
    public function __construct(){
        $this->roles = new Roles();
    }
    //Getters et Setters
    public function getId():?int{
        return $this->id_utilisateur;
    }
    public function setId(?int $id){
        $this->id_utilisateur = $id;
    }
    public function getNom():?string{
        return $this->nom_utilisateur;
    }
    public function setNom(?string $nom){
        $this->nom_utilisateur = $nom;
    }
    public function getPrenom():?string{
        return $this->prenom_utilisateur;
    }
    public function setPrenom(?string $prenom){
        $this->prenom_utilisateur = $prenom;
    }
    public function getMail():?string{
        return $this->mail_utilisateur;
    }
    public function setMail(?string $mail){
        $this->mail_utilisateur = $mail;
    }
    public function getPassword():?string{
        return $this->password_utilisateur;
    }
    public function setPassword(?string $password){
        $this->password_utilisateur = $password;
    }
    public function getImage():?string{
        return $this->image_utilisateur;
    }
    public function setImage(?string $image){
        $this->image_utilisateur = $image;
    }
    public function getStatut():?bool{
        return $this->statut_utilisateur;
    }
    public function setStatut(?bool $statut){
        $this->statut_utilisateur = $statut;
    }
    public function getRoles():?Roles{
        return $this->roles;
    }
    public function setRoles(?Roles $roles){
        $this->roles = $roles;
    }
    //Méthodes
    public function add(){
        try {
            //récupérer les données de l'objet
            $nom = $this->nom_utilisateur;
            $prenom = $this->prenom_utilisateur;
            $mail = $this->mail_utilisateur;
            $password = $this->password_utilisateur;
            $image = $this->image_utilisateur;
            $statut = $this->statut_utilisateur;
            $req = $this->connexion()->prepare(
                "INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, 
                mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur) VALUES(?,?,?,?,?,?)");
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $prenom, \PDO::PARAM_STR);
            $req->bindParam(3, $mail, \PDO::PARAM_STR);
            $req->bindParam(4, $password, \PDO::PARAM_STR);
            $req->bindParam(5, $image, \PDO::PARAM_STR);
            $req->bindParam(6, $statut, \PDO::PARAM_BOOL);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            //récupérer les données de l'objet
            $mail = $this->mail_utilisateur;
            $req = $this->connexion()->prepare(
                "SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, 
                mail_utilisateur, password_utilisateur, statut_utilisateur, image_utilisateur FROM utilisateur WHERE mail_utilisateur = ?");
            $req->bindParam(1, $mail, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Utilisateur::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?> 