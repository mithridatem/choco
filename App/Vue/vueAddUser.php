<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <form action="" method="post">
        <label for="nom_utilisateur">Saisir le nom:</label>
        <input type="text" name="nom_utilisateur">
        <label for="prenom_utilisateur">Saisir le prénom:</label>
        <input type="text" name="prenom_utilisateur">
        <label for="mail_utilisateur">Saisir le mail:</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le Password:</label>
        <input type="password" name="password_utilisateur">
        <label for="repeat_password_utilisateur">Re saisir le Password:</label>
        <input type="password" name="repeat_password_utilisateur">
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form>
</body>
</html>