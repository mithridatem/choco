<?php ob_start()?>
    <form action="" method="post" enctype="multipart/form-data">
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
        <input type="file" name="image_utilisateur">
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form>
<?php $content = ob_get_clean()?>