<?php ob_start()?>
<?php foreach($tab as $com):?>
    <div class="commentaire">
        <textarea cols="30" rows="10"><?=$com->getText()?></textarea>
        <p><?="Note : ".$com->getNote()?></p>
        <?php $date = new \DateTimeImmutable($com->getDate())?>
        <p><?=$date->format('d/m/Y').' '.$com->prenom_utilisateur.' '.$com->nom_utilisateur?></p>
        <a href="./commentaireupdate?id=<?=$com->getId()?>">Modifier</a>
        <a href="./commentairedelete?id=<?=$com->getId()?>">Supprimer</a>
    </div>
<?php endforeach?>
<p><?=$error?></p>
<?php $content = ob_get_clean()?>