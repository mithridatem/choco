<?php ob_start()?>
    <?php foreach($tab as $chocoblast):?>
        <div class="chocoblast">
            <p><?=$chocoblast->getSlogan()?></p>
            <p><?php 
                $date = new DateTimeImmutable($chocoblast->getDate());
                echo $date->format('d m Y');?>
            </p>
            <p>Nom cible: <?= $chocoblast->cible_nom?></p>
            <p>Prenom cible: <?= $chocoblast->cible_prenom?></p>
            <img src="./Public/asset/images/<?=$chocoblast->cible_image?>">
            <p>Auteur : <?= $chocoblast->auteur_nom." ".$chocoblast->auteur_prenom?></p>
            <a href='./chocoblastupdate?id_chocoblast=<?=$chocoblast->getId()?>&auteur_id=<?=$chocoblast->auteur_id?>'>modifier</a>
            <a href='./commentaireadd?id_chocoblast=<?=$chocoblast->getId()?>'>Ajouter commentaire</a>
        </div>
    <?php endforeach?>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>