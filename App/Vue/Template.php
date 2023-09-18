<?php
namespace App\vue;
class Template{
    public static function render($navbar,$title,$content,$footer,$error, array $js, array $css){
        if(file_exists('./App/Vue/'.$content)){
            include './App/Vue/'.$navbar;
            include './App/Vue/'.$footer;
            include './App/Vue/'.$content;
        }
        else{
            $navbar = "";
            $footer = "";
            $title = "Error 404";
            include './App/Vue/vueError.php';
        }
        include './App/Vue/vueTemplate.php';
    }
}
?>