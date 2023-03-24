<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Utilisateur;
    class Chocoblast extends BddConnect{
        
        private $id_chocoblast;
        private $slogan_chocoblast;
        private $date_chocoblast;
        private $status_chocoblast;
        private ?Utilisateur $cible_chocoblast;
        private ?Utilisateur $auteur_chocoblast;
        

        public function __construct(){
            $this->cible_chocoblast = new Utilisateur();
            $this->auteur_chocoblast = new Utilisateur();
            $this->status_chocoblast = true;
        }

        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }

        public function getSloganChocoblast(){
            return $this->slogan_chocoblast;
        }

        public function getDateChocoblast(){
            return $this->date_chocoblast;
        }

        public function getStatusChocoblast(){
            return $this->status_chocoblast;
        }
        public function getCibleChocoblast(){
            return $this->cible_chocoblast;
        }

        public function getAuteurChocoblast(){
            return $this->auteur_chocoblast;
        }
        public function setSloganChocoblast($slogan_chocoblast){
            $this->slogan_chocoblast = $slogan_chocoblast;
        }

        public function setDateChocoblast($date_chocoblast){
            $this->date_chocoblast = $date_chocoblast;
        }
        public function setStatusChocoblast($status_chocoblast){
            $this->status_chocoblast = $status_chocoblast;
        }

        public function setCibleChocoblast($cible_chocoblast){
            $this->cible_chocoblast = $cible_chocoblast;
        }
        public function setAuteurChocoblast($auteur_chocoblast){
            $this->auteur_chocoblast = $auteur_chocoblast;
        }

        public function addChocoblast(){
            try {
                $sloganChocoblast = $this->getSloganChocoblast();
                $date_chocoblast = $this->getDateChocoblast();
                $status_chocoblast = $this->getStatusChocoblast();
                $auteur_chocoblast = $this->getAuteurChocoblast()->getIdUtilisateur();
                $cible_chocoblast = $this->getCibleChocoblast()->getIdUtilisateur();
                

                $req=$this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast , date_chocoblast, status_chocoblast , auteur_chocoblast , cible_chocoblast ) VALUES (?,?,?,?,?)');
                $req->bindParam(1 , $sloganChocoblast, \PDO::PARAM_STR);                                
                $req->bindParam(2 , $date_chocoblast, \PDO::PARAM_STR);
                $req->bindParam(3 , $status_chocoblast, \PDO::PARAM_STR);
                $req->bindParam(4 , $auteur_chocoblast, \PDO::PARAM_STR);
                $req->bindParam(5 , $cible_chocoblast, \PDO::PARAM_STR);


                $req->execute();

            }
            catch(\Exception $e) {
                die('Erreur :'.$e->getMessage());
            }

        }

        public function __tooString(){
            return $this->slogan_chocoblast;
        }


    }
    


?>