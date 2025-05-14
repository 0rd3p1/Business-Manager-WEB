<?php

if (isset($_SESSION['id'])) {
    view('product', compact('products'));
}

view('index');

?>