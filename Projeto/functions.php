<?php

// Redireciona a rota e alinha o array de dados
function view($view, $data1 = [], $data2 = []){
    foreach($data1 as $key => $value){
        $$key = $value;
    }

    foreach($data2 as $key => $value){
        $$key = $value;
    }

    require "views/template/app.php";
}

// Disseca o dado ou array selecionado (os '...' são para se for varios dados sem ser array)
function dd(...$dump){
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
    die();
}

// Mostra o erro 404
function abort($code){
    http_response_code(404);
    view($code);
    die();
}

?>