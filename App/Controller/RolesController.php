<?php
    namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Fonctions;

    class RolesController extends Roles{

        public function insertRoles(){

            $msg = "";

            if (isset($_POST['submit'])){
                $nom_roles =Fonctions::CleanInput($_POST['nom_roles']) ;               

                if(!empty($nom_roles)){
                    $this->setNom($nom_roles);
                    if($this->getUserRoles()){
                        $msg= "Les information sont incorrectes";

                    }
                    else{
                        $this->setNom($nom_roles);
                        $this->addRoles();
                        $msg = "Le compte : " .$nom_roles ." a été en BDD";
                    }

                }
                else{
                     $msg = "Veuillez remplir tous les champs du formulaire";
                }
                include './App/Vue/viewAddRoles.php';
            }

            
    }

    

    }



?>
