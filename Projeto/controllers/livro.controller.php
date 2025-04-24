<?php

$livro = (new DB)->query(
    'SELECT * FROM livros WHERE id = :id',
    Livro::class,
    ['id' => $_REQUEST['id']]
)->fetch();

// Redireciona a rota para o livro selecionado
view('livro', ['livro' => $livro]);

?>