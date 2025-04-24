<?php

$filme = (new DB)->query(
    'SELECT * FROM filmes WHERE id = :id',
    Filme::class,
    ['id' => $_REQUEST['id']]
)->fetch();

// Redireciona a rota para o livro selecionado
view('filme', ['filme' => $filme]);

?>