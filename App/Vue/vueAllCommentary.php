<?php ob_start()?>
<?php foreach($tab as $com):?>
        <div class="commentaire">
        </div>
    <?php endforeach?>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>