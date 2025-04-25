<?php

function db () {
    return $db = new PDO('sqlite:db.sqlite');
}

?>