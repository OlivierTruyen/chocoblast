<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Utilisateur;
    use App\Model\Chocoblast;

    class Commentaire extends BddConnect{
        
        private $id_commentaire;
        private $note_commentaire;
        private $text_commentaire;
        private $date_commentaire;
        private $status_commentaire;
        private ?Chocoblast $id_chocoblast;
        private ?Utilisateur $auteur_commentaire;


        public function __construct(){
            $this-> id_chocoblast = new Chocoblast();
            $this->auteur_commentaire = new Utilisateur();
        }


        public function getIdCommentaire(){
            return $this->id_commentaire;
        }

        public function getNoteCommentaire(){
            return $this->note_commentaire;
        }
        public function getStatusCommentaire(){
            return $this->note_commentaire;
        }
        public function getTextCommentaire(){
            return $this->text_commentaire;
        }

        public function getDateCommentaire(){
            return $this->date_commentaire;
        }
        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }
        public function getAuteurChocoblast(){
            return $this->auteur_commentaire;
        }
        public function setNoteCommentaire($note_commentaire){
            $this->note_commentaire = $note_commentaire;
        }
        public function setStatusCommentaire($status_commentaire){
            $this->status_commentaire = $status_commentaire;
        }

        public function setTextCommentaire($text_commentaire){
            $this->text_commentaire = $text_commentaire;
        }

        public function setdATECommentaire($date_commentaire){
            $this->date_commentaire = $date_commentaire;
        }

        public function setIdChocoblast($id_chocoblast):?int{
            return $this->id_chocoblast=$id_chocoblast;
        }
        public function setAuteurChocoblast($auteur_chocoblast){
            return $this->auteur_commentaire = $auteur_chocoblast;
        }


        public function addCommentaire(){

            try {
                $note_commentaire = $this->note_commentaire;
                $text_commentaire = $this->text_commentaire;
                $date_commentaire = $this->date_commentaire;
                $status_commentaire = $this->status_commentaire;
                $id_chocoblast = $this->id_chocoblast->getIdChocoblast();
                $auteur_commentaire = $this->auteur_commentaire->getIdUtilisateur();
                

                $req=$this->connexion()->prepare('INSERT INTO commentaire(note_commentaire , text_commentaire, date_commentaire , id_chocoblast , status_commentaire , auteur_commentaire ) VALUES (?,?,?,?,?,?)');
                $req->bindParam(1 , $note_commentaire, \PDO::PARAM_STR);                                
                $req->bindParam(2 , $text_commentaire, \PDO::PARAM_STR);
                $req->bindParam(3 , $date_commentaire, \PDO::PARAM_STR);
                $req->bindParam(4 , $status_commentaire, \PDO::PARAM_STR);
                $req->bindParam(5 , $id_chocoblast, \PDO::PARAM_STR);
                $req->bindParam(6 , $auteur_commentaire, \PDO::PARAM_STR);


                $req->execute();

            }
            catch(\Exception $e) {
                die('Erreur :'.$e->getMessage());
            }

        }

        public function __toostring(){
            return $this->text_commentaire;
        }

        
    }


?>