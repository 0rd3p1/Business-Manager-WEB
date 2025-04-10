<?php

// Rota padrão como index
$controller = 'index';

// Verificando se existe uma rota no URL
if(isset($_SERVER['PATH_INFO'])){
    // Se existe, troca a rota para a descrita na URL
    $controller = str_replace('/', '', $_SERVER['PATH_INFO']);
}

// Envia para a rota selecionada
require "controllers/{$controller}.controller.php";

?>