<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 04/09/2018
 * Time: 10:24
 */
require 'config.php';
try {
    $sql  = 'SELECT * FROM `messages` WHERE `read` = 0 ORDER BY id DESC LIMIT 1';
    if ($res = $db->query($sql)) {

        if ($res->fetchColumn() > 0) {
            print_r($res->fetchColumn());
            foreach ($db->query($sql) as $row) {
                $resp = json_encode($row);
               $sql = 'DELETE FROM `messages`';
                /*$stmt = $db->prepare($sql);
                $stmt->execute();*/
                header('Content-Type: application/json');
                echo $resp;
            }
        }else{
            $row = ['x'  => 0, 'y' => 0, 'z' => 0];
            $resp = json_encode($row);
            header('Content-Type: application/json');
            echo $resp;
        }
    }
}catch (PDOException $e){
    print_r($e->getMessage());
}


