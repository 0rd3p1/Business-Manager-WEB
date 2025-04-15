<?php

// Pega a rota da URI e adiciona na variavel de uma maneira 
$controller = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

// Deixa como padrão a rota index
if(!$controller) $controller = 'index';

// Verifica se a rota existe
if(!file_exists("controllers/{$controller}.controller.php")){
    // Abre a função erro 404
    abort(404);
}

// Envia para a rota selecionada
require "controllers/{$controller}.controller.php";