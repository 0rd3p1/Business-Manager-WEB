<?php

require 'dados.php';

// Filtra o array para mostrar o livro selecionado
$id = $_REQUEST['id'];
$filtrado = array_filter($livros, fn($l) => $l['id'] == $id);
$livro = array_pop($filtrado);

// Redireciona a rota para o livro selecionado
view('livro', ['livro' => $livro]);

?>