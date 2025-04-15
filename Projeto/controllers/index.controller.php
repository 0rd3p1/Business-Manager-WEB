<?php

require 'dados.php';

// Redireciona a rota para o index
view('index', ['livros' => $livros]);

?>