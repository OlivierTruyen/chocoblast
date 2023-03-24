<?php
    if(isset($_SESSION['connected'])){

    

?>


    <div id="navbar">
        <li><a href="./">Home </a></li>
        <li><a href="./userAdd">Inscription</a></li>
        <li><a href="./deconnexion">deconnexion</a></li>

    </div>
<?php
    }
    else{

    

?>

    <div id="navbar">
        <li><a href="./">Home </a></li>
        <li><a href="./userAdd">Inscription</a></li>
        <li><a href="./rolesAdd">Ajouter role</a></li>
        <li><a href="./connexion">Connexion</a></li>
    </div>

<?php
    }

?>
