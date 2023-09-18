<?php ob_start()?>
<?php if(isset($_SESSION['connected'])):?>
<ul>
    <li><a href="./">Accueil</a></li>
    <li><?=$_SESSION['nom']?></li>
    <li><a href="./userdeconnexion">Deconnexion</a></li>
</ul>
<?php else:?>
<ul>
    <li><a href="./">Accueil</a></li>
    <li><a href="./useradd">Inscription</a></li>
    <li><a href="./userconnexion">Connexion</a></li>
</ul>
<?php endif;?>
<?php $navbar = ob_get_clean()?>