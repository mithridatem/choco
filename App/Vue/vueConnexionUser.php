<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="" method="post">
        <label for="mail_utilisateur">Saisir son email</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir son mot de passe</label>
        <input type="password" name="password_utilisateur">
        <input type="submit" value="Connexion" name="submit">
    </form>
    <?=$error?>
</body>
</html>