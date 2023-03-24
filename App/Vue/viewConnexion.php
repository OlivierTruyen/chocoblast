<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/style.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Document</title>
</head>
<body>
<?php include './App/Vue/viewMenu.php' ; ?>
    <div class="form">
        <form action="" method="POST">
            <label for="mail_utilisateur">email :</label>
            <input type="text" name="mail_utilisateur">

            <label for="">Mot de passe :</label>
            <input type="password" name="password_utilisateur">
            <input type="submit" name="submit">

        </form>
    </div>

    <div id="error"> <?php echo $msg; ?></div>
</body>
</html>