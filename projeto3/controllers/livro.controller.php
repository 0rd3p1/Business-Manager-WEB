<?php

$livro = (new DB)->query(
    'SELECT * FROM livros WHERE id = :id',
    Livro::class,
    ['id' => $_REQUEST['id']]
)->fetch();

view('livro', ['livro' => $livro]);

?>