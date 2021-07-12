<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 04/09/2018
 * Time: 10:24
 */
require 'config.php';

$x = $_POST['x'];
$y = $_POST['y'];
$z = $_POST['z'];

try {
    $sql  = "INSERT INTO messages (x,y,z,created_at) VALUES ($x,$y,$z,NOW())";
    $stmt= $db->prepare($sql);
    $stmt->execute();
    echo 'ok' ;
}catch (PDOException $e){
    print_r($e->getMessage());
}