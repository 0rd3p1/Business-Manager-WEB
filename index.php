<?php

if (!isset($_SESSION)) {
    session_start();
}

require 'DataBase.php';

require 'ConnectionAPI.php';
$api = new ConnectionAPI('http://localhost:8080');

require 'routes.php';

?>