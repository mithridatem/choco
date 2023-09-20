<?php ob_start()?>
<h1></h1>
<div>
    <?php foreach($tab as $value):?>
        <?= $value->getSlogan()?>
     <?php endforeach?>
</div>
<?php $content = ob_get_clean()?>