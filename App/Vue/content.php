<?php ob_start()?>
    <form action="" method="post">
        <input type="text" name="1" id="">
        <input type="text" name="2" id="">
        <input type="text" name="3" id="">
        <input type="text" name="4" id="">
        <input type="text" name="5" id="">
        <input type="submit" value="Ajouter">
    </form>
<?php $content = ob_get_clean()?>
