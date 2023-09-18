<?php
namespace App\Utils;
class Utilitaire{
    public static function cleanInput(?string $valeur):?string{
        return htmlspecialchars(strip_tags(trim($valeur)));
    }
    public static function getFileExtension($file){
        return substr(strrchr($file,'.'),1);
    }
}