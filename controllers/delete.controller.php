<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $table = $_GET['table'];

    $db->query(
        query: "DELETE FROM $table WHERE id = :id",
        params: [
            'id' => $id
        ]
    );

    header("Location: /");
    exit;
} else {
    $id = $_GET['id'];
    $table = $_GET['table'];

    $name = $db->query(
        query: "SELECT name FROM $table WHERE id = :id",
        params: [
            'id' => $id
        ]
    )->fetch();

    view('delete', compact('name'));
}
