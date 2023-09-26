<?php ob_start()?>
<?php http_response_code(401)?>
    <h1>Erreur 401 Vous n'étes pas autorisé a accéder la ressource</h1>
<?php $content = ob_get_clean()?>