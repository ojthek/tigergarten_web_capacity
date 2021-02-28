<?php
    session_start();
    require_once "src/functions.php";
    require_once "src/ChildController.php";
    require_once "src/TimeHelper.php";

    $dbUser = "db1069571-14382";
    $dbPassword = "03z5WQ7FS4B6E9LL";
    $dbServer = "wp103.webpack.hosteurope.de";
    $dbName = "db1069571-v";

    $mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $childController = new ChildController($mysqli);

    $_MAX_CAPA = 7;
?>