<?php
require 'config.php';
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$sql = 'SELECT min(x) as minx, min(y) as miny, min(z) as minz,max(x) as maxx, max(y) as maxy, max(z) as maxz,avg(x) as avgx, avg(y) as avgy, avg(z) as avgz FROM `messages`';

foreach ($db->query($sql) as $row) {
    $data = $row;
}

$data['x'] = [];
$datay['y'] = [];
$data['z'] =  [];
$times = [];
$sql = 'SELECT * FROM messages';
foreach ($db->query($sql) as $row) {
    $data['x'][] = $row['x'];
    $data['y'][] = $row['y'];
    $data['z'][] = $row['z'];
    $times[]  =  $row['created_at'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real time analytics</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script>
        var x = <?= json_encode($data['x']); ?>;
        var y = <?= json_encode($data['y']); ?>;
        var z = <?= json_encode($data['z']); ?>;
        var times = <?= json_encode($times); ?>;

    </script>
</head>
<body>
<input type="hidden" id="x"><input type="hidden" id="y"><input type="hidden" id="z">
<nav>
    <div class="nav-wrapper">
        <div class="container">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Real Time Data <i class="material-icons right">directions_car</i></a></li>
            </ul>
        </div>

    </div>
</nav>

<!--<div class="row">-->
<!--<div class="col s12 m6">
    <div class="card blue-grey darken-1">
        <div class="card-content white-text">
            <span class="card-title">Live stream</span>
            <iframe src="http://10.1.106.218:8080/?action=stream" frameborder="0" width="700" height="500"></iframe>
        </div>
    </div>
</div>-->
<div class="container">
    <div class="row" style="height: 300px; margin-bottom: 10px">
        <table>
            <thead>
            <tr>
                <th>Stats</th>
                <th>gX</th>
                <th>gY</th>
                <th>gZ</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Min</td>
                <td><span id="minx"><?= number_format($data['minx'], 3, '.', ''); ?></span></td>
                <td><span id="miny"><?= number_format($data['miny'], 3, '.', ''); ?></span></td>
                <td><span id="minz"><?= number_format($data['minz'], 3, '.', ''); ?></span></td>
            </tr>
            <tr>
                <td>Max</td>
                <td><span id="maxx"><?= number_format($data['maxx'], 3, '.', ''); ?></span></td>
                <td><span id="maxy"><?= number_format($data['maxy'], 3, '.', '');?></span></td>
                <td><span id="maxz"><?= number_format($data['maxz'], 3, '.', ''); ?></span></td>
            </tr>
            <tr>
                <td>Avg</td>
                <td><span id="avgx"><?= number_format($data['avgx'], 3, '.', ''); ?></span></td>
                <td><span id="avgy"><?= number_format($data['avgx'], 3, '.', ''); ?></span></td>
                <td><span id="avgz"><?= number_format($data['avgx'], 3, '.', ''); ?></span></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col s16 m6">
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="realChartx"></canvas>
        </div>
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="realCharty"></canvas>
        </div>
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="realChartz"></canvas>
        </div>
    </div>
    <div class="col s1=6 m6">
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="summaryChartx"></canvas>
        </div>
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="summaryCharty"></canvas>
        </div>
        <div class="row" style="height: 300px; margin-bottom: 10px">
            <canvas id="summaryChartz"></canvas>
        </div>
    </div>
</div>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/Moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript" src="js/chartjs-plugin-streaming.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>