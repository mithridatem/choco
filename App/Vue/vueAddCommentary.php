<?php ob_start()?>
    <form action="" method="post">
        <label for="note_commentaire">Noter le chocoblast</label>
        <select name="note_commentaire">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="text_commentaire">Saisir votre commentaire :</label>
        <textarea name="text_commentaire"cols="20" rows="5"></textarea>
        <input type="submit" value="Ajouter" name="submit">   
    </form>
    <p><?=$error?></p>
<?php $content = ob_get_clean()?>