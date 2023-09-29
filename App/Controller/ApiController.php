<?php
namespace App\Controller;
class ApiController{
    public function getAllRoles(){
        $data = ['id'=>1, 'nom'=> 'Utilisateur'];
        $json = json_encode($data);
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        header('Accept: application/json');
        echo $json;
    }
    public function addRoleByJson(){
        $json = file_get_contents("php://input");
        $data = json_decode($json);
        dd($data);
    }
}

?>