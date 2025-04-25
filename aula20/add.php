<?php

include 'head.php';
include 'protectUser.php';

if (!isset($_SESSION)) {
    session_start();
};

?>

<form action="actions.php" method="POST" enctype="multipart/form-data">
    <div class="flex place-items-center flex-col mb-80">
        <div class="flex flex-col place-items-center bg-stone-700 w-100 mt-40 rounded-xl shadow-xl text-stone-400">
            <div class="flex flex-col m-7">
                <label class="font-bold" for="title">Título</label>
                <input type="text" name="title" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold" for="author">Autor</label>
                <input type="text" name="author" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold" for="desc">Descrição</label>
                <input type="text" name="desc" class="rounded-md w-60 bg-stone-500 text-white pb-20">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold" for="img">Imagem</label>
                <input class="rounded-md w-75 bg-stone-500 text-white" type="file" name="img">
            </div>

            <?php
            if (isset($_SESSION['errorTitle'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorTitle'] . '</h1>';
                unset($_SESSION['errorTitle']);
            }
            ?>

            <?php
            if (isset($_SESSION['errorAuthor'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorAuthor'] . '</h1>';
                unset($_SESSION['errorAuthor']);
            }
            ?>

            <?php
            if (isset($_SESSION['errorDesc'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorDesc'] . '</h1>';
                unset($_SESSION['errorDesc']);
            }
            ?>

            <?php
            if (isset($_SESSION['errorImg'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorImg'] . '</h1>';
                unset($_SESSION['errorImg']);
            }
            ?>

            <div class="flex place-items-center m-7 text-black">
                <button class="bg-slate-500 hover:bg-slate-600 rounded-md w-40" type="submit" name="add">Adicionar</button>
            </div>
        </div>

        <div class="flex flex-row">
            <a href="../" class="text-extrabold mt-10 font-bold">Voltar</a>
        </div>
    </div>
</form>


<?php include 'footer.php' ?>