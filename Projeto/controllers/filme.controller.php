<?php

$id = $_REQUEST['id'];
$filme = (new DB) -> filme($id);

// Redireciona a rota para o livro selecionado
view('filme', ['filme' => $filme]);

?>