<?php

ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
$config=parse_ini_file('config.ini');

$dns='mysql:host='.$config['host'].';dbname='.$config['db'];
try {
    $db = new PDO($dns, $config['user'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
}catch (PDOException $e){
    print_r($e->getMessage());
}