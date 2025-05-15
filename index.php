<?php

if (!isset($_SESSION)) {
    session_start();
}

require 'models/User.php';
require 'models/Business.php';
require 'models/Product.php';

require 'functions.php';

require 'Validation.php';

$dbConfig = require 'dbConfig.php';
require 'DataBase.php';

require 'ConnectionAPI.php';

require 'routes.php';

//session_unset();
//unset($_POST);

?>