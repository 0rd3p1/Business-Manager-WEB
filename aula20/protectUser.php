<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("<h1 class:'flex place-items-center wt-80'>Você não tem permissão de acessar essa pagina! <a href='index.php'> Voltar para a pagina Inicial</h1>");
}

?>