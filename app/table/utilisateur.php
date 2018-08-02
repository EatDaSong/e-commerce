<?php

/* 	=================================================================================================
  Fichier : utilisateur.class.php
  Auteur : Ravinet Marianne, Cyrille Gandon
 Modifié par : stephane LAVIGNE

  Description : Classe PHP regroupant toutes les fonctions de manipulations d'un utilisateur
  (inscription, connexion, mon compte, etc...)
 * Requière la classe DATABASE et DATA de lavigne stéphane.
  ================================================================================================= */

namespace app\table;

use \app\data;

class Utilisateur {

    private $id;
    private $pseudo;
    private $motDePasse;
    private $email;
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $sexe;
    private $adresse;
    private $ville;
    private $codePostal;
    private $pays;
    private $urlAvatar;
    private $participeAuConcours;
    private $admin = false;
    private $droits;

    //Constructeur
    function __construct($idMembre) {
        //Si l'utilisateur est déjà connecté, cette fonction ira dans la bdd lire les infos sur l'utilisateur désigné
        //Variables utilisées :
        $ligne = data::getDB()->prepareAssoc("SELECT * FROM membres WHERE id_membre='" . $idMembre . "'");
        //Si il y a un résultat sinon c'est une erreur de membre inexistant		    
        if ($ligne == true) {
            $this->id = $ligne['id_membre'];
            $this->pseudo = $ligne['pseudo'];
            $this->motDePasse = $ligne['mot_de_passe'];
            $this->nom = $ligne['nom'];
            $this->prenom = $ligne['prenom'];
            $this->email = $ligne['email'];
            $this->sexe = $ligne['sexe'];
            $this->dateDeNaissance = $ligne['date_de_naissance'];
            $this->adresse = $ligne['adresse'];
            $this->ville = $ligne['ville'];
            $this->codePostal = $ligne['code_postal'];
            $this->pays = $ligne['pays'];
            $this->urlAvatar = $ligne['url_avatar'];
            $this->admin = $ligne['admin'];
        }
        //$this->droits();
    }

    /*
     * Fonction droits() permet de connaitre les droits de l'utilisateur
     */


    /* private function droits(){
      $lignes = data::getDB()->prepareAssoc("SELECT nom FROM droits, dispose_de WHERE dispose_de.id_membres =".$this->id." AND dispose_de.id_droits = droits.id_droit");

      while($ligne == true)
      {
      $this->droits[$ligne['nom']] = true;
      switch($ligne['nom']){
      case "admin":
      $this->admin = true;
      break;
      case "membre":
      $this->membre = true;
      break;
      }
      }
      } */

    /**
     * 	Permet d'inscrire un utilisateur au site.
     * @param $pseudo
     * @param $motDePasse1
     * @param $motDepasse2
     * @param $nom
     * @param $prenom
     * @param $sexe
     * @param $dateDeNaissance
     * @param $email1
     * @param $email2
     * @param $adresse
     * @param $ville
     * @param $codePostal
     * @param $pays
     * @param $participeAuConcours
     * @return boolean => true = ok, false = erreur
     */
    public static function inscription($pseudo, $motDePasse, $nom, $prenom, $sexe, $dateDeNaissance, $email, $adresse, $ville, $codePostal, $pays) {

        $can = true;
        $errors = '';

        if(self::pseudoDejaUtilise($pseudo)) { //On verifie que le mot de passe n'éxiste pas, s'il existe on stock l'erreur et on passe can à false pour ne pas executer l'inscription.
            $errors = $errors . " pseudo ";
            $can = false;
        }

        if(self::emailDejaUtilise($email)){
            $errors = $errors . " email ";
            $can = false;
        }

        if ($can) {
            if ($pseudo == "" || $motDePasse == "" || $email == "") {
                $can = false;
                $errors = $errors . "vide";
            }
            if ($dateDeNaissance == "") {
                $dateDeNaissance = "0000-00-00";
            }/*   else {
                $dateDeNaissance2 = explode("/", $dateDeNaissance);
                $dateDeNaissance = $dateDeNaissance2[2] . "-" . $dateDeNaissance2[1] . "-" . $dateDeNaissance2[0];
            }*/
            if ($can) {
                //On crypte le mot de passe :
                $motDePasseCrypt = md5($motDePasse);
                //On se connecte à la base de données
                //On prépare la requête (entre autre contre les injections avec pdo->prepare)
                //id_membre 	pseudo 	mot_de_passe 	nom 	prenom 	email 	sexe 	date_de_naissance 	adresse 	ville 	code_postal 	pays 	url_avatar 	participe_au_concours 	admin
                data::getDB()->prepareExec("INSERT INTO membres VALUES(0, '" . $pseudo . "', '" . $motDePasseCrypt . "', '" . $nom . "', '" . $prenom . "', '" . $email . "', '" . $sexe . "', '" . $dateDeNaissance . "', '" . $adresse . "', '" . $ville . "', '" . $codePostal . "', '" . $pays . "', '', '0')");
            }
            if($can) {
                return $can;
            } else {
                return $errors;
            }
            
        } else {
            return $errors;
        }
    }

    /**
     * Function pseudoDejaUtilise
     * Vérifie si le pseudo n'est pas déjà utilisé
     * @param $pseudo
     * @return boolean : true si déjà utilisé
     */
    public static function pseudoDejaUtilise($pseudo) {
        $ligne = data::getDB()->prepareAssoc("SELECT id_membre FROM membres WHERE pseudo='" . $pseudo . "'");
        //Si il y a un résultat c'est que l'utilisateur existe déjà
        //print_r($ligne);
        if ($ligne == true)
            return true;
        else
            return false;
    }

    /**
     * Function emailDejaUtilise
     * Vérifie si l'email n'est pas déjà utilisé
     * @param $pseudo
     * @return boolean : true si déjà utilisé
     */
    public static function emailDejaUtilise($email) {

        $ligne = data::getDB()->prepareAssoc("SELECT id_membre FROM membres WHERE email='" . $email . "'");
        
        if ($ligne == true)
            return true;
        else
            return false;
    }

    public static function connexion($pseudoUtilisateur, $motDePasse, $varSession) {
        /*
         * Utilisation :
         * un utilisateur veut se connecter, on appelle la fonction en indiquant le nom de l'utilisateur et le mot ed passe indiqué
         * la fonction vérifie si cela correspond bien, si oui on renvoie true, si non on renvoie false
         * 
         */
        //Variables utilisées :				
        $requete;
        $ligne;
        $retour = false;
        $motDePasseCrypt;

        //On crypte le mot de passe :
        $motDePasseCrypt = md5($motDePasse);
        
        $ligne = data::getDB()->prepareAssoc("SELECT id_membre FROM membres WHERE (pseudo='" . $pseudoUtilisateur . "' OR email='" . $pseudoUtilisateur . "') AND mot_de_passe='" . $motDePasseCrypt . "'");
        //print_r ($ligne);
        //Si il y a un résultat c'est que l'utilisateur c'est bien logé
        if ($ligne == true) {
            $_SESSION[$varSession] = $ligne['id_membre']; //On créer une variable session qui à pour valeur l'id de l'utilisateur logé
            $retour = true; //On retourne true pour dire que tout c'est bien passé
        }
        //Sinon c'est que le mot de passe ou le nom d'utilisateur n'est pas bon
        else {
            $retour = false; //Si c'est pas bon on renvoie false
        }
        return $retour;
    }

    /*
     *  Fonction deconnexion, detruit les variables de sessions utilisé par la classe
     */

    public static function deconnexion($varSession) {
        unset($_SESSION[$varSession]);
        if (isset($_SESSION[$varSession]))
            return false;
        else
            return true;
    }

    /*
     *  Fonction sauverLUtilisateur, permet de sauvegarder l'utilisateur dans la bdd avec des modifications
     *  Retourne false si la sauvegarde à échouée
     */

    public function sauvegarderLUtilisateur() {

        //id_membre 	pseudo 	mot_de_passe 	nom 	prenom 	email 	sexe 	date_de_naissance 	adresse 	ville 	code_postal 	pays 	url_avatar 	participe_au_concours 	admin
        $retour = data::getDB()->prepareExec("UPDATE membres SET pseudo = '" . $this->pseudo . "',
		    										 mot_de_passe = '" . $this->motDePasse . "', 
		    										 nom = '" . $this->nom . "', 
		    										 prenom ='" . $this->prenom . "', 
		    										 email = '" . $this->email . "', 
		    										 sexe = '" . $this->sexe . "', 
		    										 date_de_naissance = '" . $this->dateDeNaissance . "', 
		    										 adresse = '" . $this->adresse . "', 
		    										 ville = '" . $this->ville . "', 
		    										 code_postal = '" . $this->codePostal . "', 
		    										 pays = '" . $this->pays . "', 
		    										 url_avatar = '" . $this->urlAvatar . "'
		    										 WHERE id_membre = '" . $this->id . "'");		  		

        return $retour;
    }

    /*
     * 	Fonction supprimerLUtilisateur, Static, supprime le membre de la base de donnée
     */

    public static function supprimerLUtilisateur($id_membre) {
        //On se connecte à la base de données
        $pdo = connectionBDD();
        $requete = $pdo->prepare("DELETE FROM membres WHERE id_membre =" . $id_membre);
        //On effectue la requete			   
        $retour = $requete->execute();
        //print_r($requete->errorInfo());
        return $retour;
    }

    /*
     * Renvoie true si l'utilisateur est un admin, false sinon
     */

    public function isAdmin() {
        if ($this->admin == 1)
            return true;
        else
            return false;
    }

    /*
     * Renvoie true si l'utilisateur a le droit rentré en paramètre
     * Renvoie false si l'utilisateur n'a pas le droit ou si ce dernier n'existe pas
     */

    public function aLeDroit($leDroit) {
        if (isset($this->droits[$leDroit]))
            return $this->droits[$leDroit];
        else
            return false;
    }

    public function hasAvatar() {
        if ($this->urlAvatar != "")
            return true;
        else
            return false;
    }

    public function getID() {
        return $this->id;
    }

    public function getAvatar() {
        return $this->urlAvatar;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateDeNaissance() {
        $dateDeNaissance2 = explode("-", $this->dateDeNaissance);
        $dateDeNaissance = $dateDeNaissance2[2] . "/" . $dateDeNaissance2[1] . "/" . $dateDeNaissance2[0];
        return $dateDeNaissance;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getPays() {
        return $this->pays;
    }
    
    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getUrlAvatar() {
        return $this->urlAvatar;
    }

    /** Les SETEURS * */
    public function setPseudo($nvPseudo) {
        if ($nvPseudo != "")
            $this->pseudo = $nvPseudo;
    }

    public function setAvatar($nvAvatar) {
        $this->urlAvatar = $nvAvatar;
    }

    public function setNom($nvNom) {
        $this->nom = $nvNom;
    }

    public function setPrenom($nvPrenom) {
        $this->prenom = $nvPrenom;
    }

    
    public function setDateDeNaissance($nvDate) {
        if ($nvDate != "") {
            $dateDeNaissance2 = explode("/", $nvDate);
            $dateDeNaissance = $dateDeNaissance2[2] . "-" . $dateDeNaissance2[1] . "-" . $dateDeNaissance2[0];
            $this->dateDeNaissance = $dateDeNaissance;
        }
    }

    public function setSexe($nvSexe) {
        $this->sexe = $nvSexe;
    }

    public function setEmail($nvEmail) {
        if ($nvEmail != "")
            $this->email = $nvEmail;
    }

    public function setAdresse($nvAdresse) {
        $this->adresse = $nvAdresse;
    }

    public function setVille($nvVille) {
        $this->ville = $nvVille;
    }

    public function setCodePostal($nvCodePostal) {
        $this->codePostal = $nvCodePostal;
    }

    public function setPays($nvPays) {
        $this->pays = $nvPays;
    }

    public function setParticipeAuConcours($nvChoix) {
        $this->participeAuConcours = $nvChoix;
    }

    public function setMotDePasse($nvPassword) {
        if ($nvPassword != "")
            $this->motDePasse = md5($nvPassword);
    }

}

?>