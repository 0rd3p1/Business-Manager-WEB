<?php

// Puxa o banco
require 'dados.php';

// Filtro para identificar o livro selecionado
$id = $_REQUEST['id'];
$filtrado = array_filter($livros, fn($l) => $l['id'] == $id);
$livro = array_pop($filtrado);

// Rota do controller
$view = 'livro';

// Envia para a rota
require "views/template/app.php";

?>