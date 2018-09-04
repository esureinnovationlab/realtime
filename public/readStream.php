<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 04/09/2018
 * Time: 10:24
 */
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
$config=parse_ini_file('config.ini');

$dns='mysql:host='.$config['host'].';dbname='.$config['db'];
try {
    $db = new PDO($dns, $config['user'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $sql  = 'SELECT * FROM `messages` WHERE `read` = 0';
    foreach($db->query($sql) as $row){
        $resp = json_encode($row);
        header('Content-Type: application/json');
        echo $resp;
    }
}catch (PDOException $e){
    print_r($e->getMessage());
}
