<?php

$id = $_REQUEST['id'];
$livro = (new DB) -> livro($id);

// Redireciona a rota para o livro selecionado
view('livro', ['livro' => $livro]);

?>