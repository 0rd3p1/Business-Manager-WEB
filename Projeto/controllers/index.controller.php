<?php

$livros = (new DB) -> livros();
$filmes = (new DB) -> filmes();

// Redireciona a rota para o index
view('index', ['livros' => $livros], ['filmes' => $filmes]);

?>