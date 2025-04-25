<?php

include 'head.php';
include 'db.php';

if (!isset($_SESSION)) {
    session_start();
}

$query = db()->prepare('SELECT * FROM books');
$query->execute();

$books = $query->fetchAll();

?>

<header class="p-5 shadow-lg flex place-content-between bg-stone-700">
    <a href="index.php" class="text-bold text-5xl text-stone-400 font-extrabold">Livros</a>

    <nav class="flex place-items-center text-2xl font-extrabold flex-wrap">
        <?php if (isset($_SESSION['idAdm']) && $_SESSION['idAdm'] == 1) { ?>
            <a href="panelAdm.php" class="rounded-md mr-20 p-2 text-stone-400">ADM</a>
        <?php } ?>

        <?php if (isset($_SESSION['id'])) { ?>
            <a href="panelUser.php" class="rounded-md mr-20 p-2 text-stone-400">Painel</a>

            <a href="updateUser.php/?id=<?= $_SESSION['id']; ?>" class="rounded-md mr-20 p-2 text-stone-400">Editar</a>

            <a href="logout.php" class="rounded-md mr-5 p-2 text-stone-400">Sair</a>
        <?php } else { ?>
            <a href="login.php" class="rounded-md mr-5 p-2 text-stone-400">Login</a>
        <?php } ?>
    </nav>
</header>

<section class="flex flex-col place-items-center">
    <?php foreach ($books as $book) { ?>
        <article class="flex flex-col bg-stone-700 p-5 w-7xl m-20 rounded-xl place-items-center p-10 shadow-lg">
            <h1 class="text-5xl pb-5 text-stone-400"><?= $book['title']; ?></h1>
            <h2 class="text-3xl pb-10 text-stone-400">Autor: <?= $book['author']; ?></h2>
            <img class="w-150 h-150" src="uploads/<?= $book['img']; ?>">
            <p class="pt-15 text-4xl text-center text-stone-400"> <?= $book['desc']; ?> </p>
        </article>
    <?php } ?>
</section>

<?php include 'footer.php' ?>