<?php ob_start()?>
    <form action="" method="post">
        <label for="slogan_chocoblast">Saisir votre slogan</label>
        <input type="text" name="slogan_chocoblast">
        <label for="date_chocoblast">Choisir la date</label>
        <input type="date" name="date_chocoblast">
        <select name="cible_chocoblast">
            <option value="">Sélectionner une cible</option>
            <?php foreach($tab as $user):?>
                <option value="<?=$user->getId()?>"><?=$user->getPrenom()." ".$user->getNom()?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>