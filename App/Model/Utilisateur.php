<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;
    class Utilisateur extends BddConnect{
        /*-----------------------
                Attributs
        ------------------------*/
        private $id_utilisateur;
        private  $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private  $password_utilisateur;
        private $image_utilisateur;
        private  $statut_utilisateur;
        private ?Roles $roles;
        /*-----------------------
                Constructeur
        ------------------------*/
        public function __construct(){
            //instancier un objet role quand on créé un
            $this->roles = new Roles;
            $this->roles->setNom('user');
            $this->roles->setIdRoles(1);
        }
        /*-----------------------
            Getters et Setters
        ------------------------*/
        public function getIdUtilisateur(){
            return $this->id_utilisateur;
        }
        public function getNomUtilisateur(){
            return $this->nom_utilisateur;
        }
        public function getPrenomUtilisateur(){
            return $this->prenom_utilisateur;
        }
        public function getMailUtilisateur(){
            return $this->mail_utilisateur;
        }
        public function getPasswordUtilisateur(){
            return $this->password_utilisateur;
        }
        public function setNomUtilisateur($name){
            $this->nom_utilisateur = $name;
        }
        public function setPrenomUtilisateur($firstName){
            $this->prenom_utilisateur = $firstName;
        }
        public function setMailUtilisateur($mail){
            $this->mail_utilisateur = $mail;
        }
        public function setPasswordUtilisateur($pwd){
            $this->password_utilisateur = $pwd;
        }

        public function addUser(){
            try {
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;
                $id = $this->roles->getIdRoles();

                $req=$this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur , prenom_utilisateur, mail_utilisateur , password_utilisateur , id_roles) VALUES (?,?,?,?,?)');
                $req->bindParam(1 , $nom, \PDO::PARAM_STR);                                
                $req->bindParam(2 , $prenom, \PDO::PARAM_STR);
                $req->bindParam(3 , $mail, \PDO::PARAM_STR);
                $req->bindParam(4 , $password, \PDO::PARAM_STR);
                $req->bindParam(5 , $id, \PDO::PARAM_INT);

                $req->execute();

            }
            catch(\Exception $e) {
                die('Erreur :'.$e->getMessage());
            }

        }

        public function getUserByMail(){
            //exécution de la requête
            try {
 
                $mail = $this->mail_utilisateur;
     
                $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur,
                mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur, id_roles
                FROM utilisateur WHERE mail_utilisateur = ?');
     
                $req->bindParam(1, $mail, \PDO::PARAM_STR);

                $req->execute();
                //récupération sous forme de tableau d'objets
                $data = $req->fetchAll(\PDO::FETCH_OBJ);

                return $data;
            }
            //gestion des erreurs (Exception)
            catch (\Exception $e){
                //affichage de l'erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        
    }

?>