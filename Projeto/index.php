<?php

if (!isset($_SESSION)) {
    session_start();
}

// Puxa os modelos dos dados
require 'models/Filme.php';
require 'models/Livro.php';

// Chama a classe do banco de dados
require 'DataBase.php';

// Ativa as funções caso necessarias
require 'functions.php';

// Envia para a rota definida pelo usuario
require 'routes.php';
