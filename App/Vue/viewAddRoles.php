<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/style.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un Utilisateur</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php' ; ?>
    <div class="form">
        <h3>Définir un role : </h3>
        <form action="" method="POST">
            <label for="nom_role">Roles :</label>
            <input type="text" name="nom_roles">
            <input type="submit" name="submit" value="Ajouter">
        </form>
    </div>
<?php
    echo $msg;
?>
</body>
</html>