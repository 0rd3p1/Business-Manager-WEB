<?php

require 'dados.php';

// Filtra o array para mostrar o livro selecionado
$id = $_REQUEST['id'];
$filtrado = array_filter($filmes, fn($f) => $f['id'] == $id);
$filme = array_pop($filtrado);

// Redireciona a rota para o livro selecionado
view('filme', ['filme' => $filme]);

?>