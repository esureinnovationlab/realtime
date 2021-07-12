<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 05/09/2018
 * Time: 13:45
 */
require 'config.php';

$sql = 'SELECT min(x) as minx, min(y) as miny, min(z) as minz,max(x) as maxx, max(y) as maxy, max(z) as maxz,avg(x) as avgx, avg(y) as avgy, avg(z) as avgz FROM `messages`';

    foreach ($db->query($sql) as $row) {
        $data  =  json_encode($row);
        header('Content-Type: application/json');
        echo $data;
    }