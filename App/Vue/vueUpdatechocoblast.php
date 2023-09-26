<?php ob_start()?>
    <form action="" method="post">
        <label for="slogan_chocoblast">Saisir votre slogan</label>
        <input type="text" name="slogan_chocoblast" value="<?= $tab[1]->getSlogan() ?>">
        <label for="date_chocoblast">Choisir la date</label>
        <input type="date" name="date_chocoblast" value="<?= $tab[1]->getDate() ?>">
        <select name="cible_chocoblast">
            <option value="">Sélectionner une cible</option>
            <option value="<?= $tab[1]->getCible()->getId() ?>" selected>
            <?= $tab[1]->getCible()->getPrenom()." ".$tab[1]->getCible()->getNom() ?></option>
            <?php foreach($tab[0] as $user):?>
                <option value="<?=$user->getId()?>"><?=$user->getPrenom()." ".$user->getNom()?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Modifier" name="submit">
    </form>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>