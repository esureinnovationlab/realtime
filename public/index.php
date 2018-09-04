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
</head>
<body>

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

<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Live stream</span>
                <iframe src="http://10.1.106.218:8080/?action=stream" frameborder="0" width="700" height="500"></iframe>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <canvas id="myChart" width="300" height="300"></canvas>
    </div>
</div>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript" src="js/chartjs-plugin-streaming.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>