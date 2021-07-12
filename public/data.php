<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 05/09/2018
 * Time: 14:28
 */

require 'config.php';

$data['x'] = [];
$datay['y'] = [];
$data['z'] =  [];
$times['times'] = [];
$sql = 'SELECT * FROM messages';
foreach ($db->query($sql) as $row) {
    $data['x'][] = $row['x'];
    $data['y'][] = $row['y'];
    $data['z'][] = $row['z'];
    $data['times']  =  $row['created_at'];
}

header('Content-Type: application/json');
echo json_encode($data);