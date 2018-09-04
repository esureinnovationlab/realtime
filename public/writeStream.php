<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 04/09/2018
 * Time: 10:24
 */
require 'config.php';
$req = $_POST;
print_r($req);

/*try {
    $sql  = 'SELECT * FROM `messages` WHERE `read` = 0';
    foreach($db->query($sql) as $row){
        $resp = json_encode($row);
        header('Content-Type: application/json');
        echo $resp;
    }
}catch (PDOException $e){
    print_r($e->getMessage());
}*/
