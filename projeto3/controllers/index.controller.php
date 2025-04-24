<?php

$pesquisar = $_REQUEST['pesquisar'] ?? '';

$livros = (new DB)->query(
query: "SELECT * from livros WHERE titulo like 
:pesquisar or autor like :pesquisar 
or descricao like :pesquisar", 
class: Livro::class,
params: ['pesquisar' => "%$pesquisar%"])->fetchAll();

view('index', compact('livros'));

