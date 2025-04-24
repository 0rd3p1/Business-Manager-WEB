<?php

$pesquisar = $_REQUEST['pesquisar'] ?? '';

$livros = (new DB)->query(
    "SELECT * FROM livros WHERE titulo LIKE 
    :pesquisar OR autor LIKE :pesquisar 
    OR descricao LIKE :pesquisar",
    Livro::class,
    ['pesquisar' => "%$pesquisar%"]
)->fetchAll();

$filmes = (new DB)->query(
    "SELECT * FROM filmes WHERE titulo LIKE 
    :pesquisar OR diretor LIKE :pesquisar 
    OR sinopse LIKE :pesquisar",
    Filme::class,
    ['pesquisar' => "%$pesquisar%"]
)->fetchAll();

// Redireciona a rota para o index
view('index', ['livros' => $livros], ['filmes' => $filmes]);
