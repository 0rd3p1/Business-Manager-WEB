<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Location: /');
} else {
    view('register');
}

?>