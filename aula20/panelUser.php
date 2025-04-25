<?php

include 'head.php';
include 'protectUser.php';
include 'db.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<header class="p-5 shadow-lg flex place-content-between bg-stone-700">
    <a href="index.php" class="text-bold text-5xl text-stone-400 font-extrabold">Livros</a>

    <nav class="flex place-items-center text-2xl font-extrabold flex-wrap">
        <?php if ($_SESSION['idAdm'] == 1) { ?>
            <a href="panelAdm.php" class="rounded-md mr-20 p-2 text-stone-400">ADM</a>
        <?php } ?>

        <a href="updateUser.php/?id=<?= $_SESSION['id']; ?>" class="rounded-md mr-20 p-2 text-stone-400">Editar</a>

        <a href="logout.php" class="rounded-md mr-5 p-2 text-stone-400">Sair</a>
    </nav>
</header>

<?php

$query = db()->prepare('SELECT * FROM books WHERE idUser = :idUser');
$query->execute([
    'idUser' => $_SESSION['id']
]);

$books = $query->fetchAll();

?>

<div class="flex place-items-center flex-col mb-80">
    <h1 class="font-extrabold text-stone-400 mt-70 mb-5 text-lg">Seus Livros</h1>
    <table class="bg-stone-700 rounded-xl text-stone-400 font-bold">
        <thead>
            <tr>
                <th class="pr-5 pl-5 pt-2 pb-2">ID</th>
                <th class="pr-5 pl-5 pt-2 pb-2">Titulo</th>
                <th class="pr-5 pl-5 pt-2 pb-2">Autor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td class="pr-5 pl-5 pt-2 pb-2"><?= $book['id']; ?></td>
                    <td class="pr-5 pl-5 pt-2 pb-2"><?= $book['title']; ?></td>
                    <td class="pr-5 pl-5 pt-2 pb-2"> <?= $book['author']; ?></td>
                    <td class="pr-5 pl-5 pt-2 pb-2 flex">
                        <a href="updateBook.php/?id=<?= $book['id']; ?>" class="pr-2 text-yellow-600">Editar</a>
                        <a href="delBook.php/?id=<?= $book['id']; ?>" class="pl-2 text-red-500">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="add.php" class="rounded-md p-2 text-stone-400 font-bold mt-5">Adicionar</a>
</div>

<?php include 'footer.php' ?>