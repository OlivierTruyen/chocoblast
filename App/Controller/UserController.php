<?php
namespace App\Controller;
    use App\Model\Utilisateur;
    use App\Utils\Fonctions;

    class UserController extends Utilisateur{

        public function insertUser(){

            $msg = "";

            if (isset($_POST['submit'])){
                $nom =Fonctions::CleanInput($_POST['nom_utilisateur']) ;               
                $prenom =Fonctions::CleanInput($_POST['prenom_utilisateur']);
                $mail =Fonctions::CleanInput($_POST['mail_utilisateur']);
                $password =Fonctions::CleanInput($_POST['password_utilisateur']);
                if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail);
                    if($this->getUserBymail()){
                        $msg= "Les information sont incorrectes";

                    }
                    else{
                        $password = password_hash($password , PASSWORD_DEFAULT);

                        $this->setNomUtilisateur($nom);                    
                        $this->setPrenomUtilisateur($prenom);
                        $this->setPasswordUtilisateur($password);
                        $this->addUser();
                        $msg = "Le compte : " . $mail." a été en BDD";
                    }

                }
                else{
                    echo $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }


            include './App/Vue/viewAddUser.php';
        }

        public function connexionUser(){
            $msg = "";

            if(isset($_POST['submit'])){
                $mail =Fonctions::CleanInput($_POST['mail_utilisateur']);
                $password =Fonctions::CleanInput($_POST['password_utilisateur']);

                if(!empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail);
                    $this->setPasswordUtilisateur($password);

                    if($this->getUserByMail()){
                        $data =$this->getUserByMail();
                        if(password_verify($password, $data[0]->password_utilisateur)){
                            $_SESSION['connected'] = true;
                            $_SESSION['mail'] = $data[0]->mail_utilisateur;
                            $_SESSION['id'] =$data[0]->id_utilisateur;
                            $_SESSION['nom']= $data[0]->nom_utilisateur;
                            $_SESSION['prenom'] =$data[0]->prenom_utilisateur;
                            $msg = "connecté";
                        }
                        else{
                            $msg =" Mail ou mot de passe incorecte";
                        }
                    }
                }
                else{
                    $msg="Veuillez remplir les champs";
                }
            }
            include './App/Vue/viewConnexion.php';
        }

        public function deconnexionUser(){
            session_destroy();
            header('Location: ./');
        }

    }





?>