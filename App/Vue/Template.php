<?php
namespace App\vue;
class Template{
    public static function render($navbar,$title,$content,$footer){
        include './App/Vue/'.$navbar;
        include './App/Vue/'.$footer;
        include './App/Vue/'.$content;
        include './App/Vue/vueTemplate.php';
    }
}
?>