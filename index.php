<?php
    session_start();
    use App\Controller\UserController;
    use App\Controller\RolesController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    $userController = new UserController();
    $rolesController = new RolesController();
    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/chocoblast/userAdd':
            $userController->insertUser();
            break;
        case '/chocoblast/rolesAdd':
            $rolesController->insertRoles();
            break;
        case '/chocoblast/connexion':
            $userController->connexionUser();
            break;
        case '/chocoblast/deconnexion':
            $userController->deconnexionUser();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>