<?php

include 'db.php';

if (!isset($_SESSION)) {
    session_start();
}

// Entrar com um usuario existente
if (isset($_POST['login'])) {
    if (strlen($_POST['email']) == 0) {
        $_SESSION['errorEmail'] = 'Digite o email';
        header('Location: login.php');
        exit();
    } elseif (strlen($_POST['pswd']) == 0) {
        $_SESSION['errorPswd'] = 'Digite a senha';
        header('Location: login.php');
        exit();
    } else {
        $query = db()->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $_POST['email']
        ]);

        // Este 'if' esta verificando a saida do array e se houver saida adiciona na variavel '$user'
        if ($user = $query->fetch()) {
            if (password_verify($_POST['pswd'], $user['pswd'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['idAdm'] = $user['idAdm'];

                if ($user['idAdm'] == 1) {
                    header('Location: panelAdm.php');
                } else {
                    header('Location: panelUser.php');
                }
            } else {
                $_SESSION['errorPswd'] = 'Senha incorreta!';
                header('Location: login.php');
            }
        } else {
            $_SESSION['error'] = 'Email ou senha incorretos incorreto!';
            header('Location: login.php');
        }
    }
}

// Cadastar um usuario
if (isset($_POST['register'])) {
    if (strlen($_POST['name']) == 0) {
        $_SESSION['errorName'] = 'Digite um nome';
        header('Location: register.php');
        exit();
    } elseif (strlen($_POST['email']) == 0) {
        $_SESSION['errorEmail'] = 'Digite um email';
        header('Location: register.php');
        exit();
    } elseif (strlen($_POST['pswd']) == 0) {
        $_SESSION['errorPswd'] = 'Digite uma senha';
        header('Location: register.php');
        exit();
    } else {
        $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
        $idAdm;

        if ($_POST['email'] == 'pedro@pedro') {
            $idAdm = 1;
        } else {
            $idAdm = 0;
        }

        $query = db()->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $_POST['email']
        ]);

        if (!$query->fetch()) {
            $query = db()->prepare("INSERT INTO users (name, email, pswd, idAdm) VALUES (:name, :email, :pswd, :idAdm)");
            $query->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'pswd' => $hash,
                'idAdm' => $idAdm
            ]);

            header('Location: login.php');
        } else {
            $_SESSION['errorEmail'] = 'Email ja cadastrado!';
            header('Location: register.php');
        }
    }
}

// Atualizar outro usuario como ADM
if (isset($_POST['updateAdm'])) {
    if (strlen($_POST['name']) == 0) {
        $_SESSION['errorName'] = 'Digite um nome';
        header('Location: panelAdm.php');
        exit();
    } elseif (strlen($_POST['email']) == 0) {
        $_SESSION['errorEmail'] = 'Digite um email';
        header('Location: panelAdm.php');
        exit();
    } elseif (strlen($_POST['pswd']) == 0) {
        $_SESSION['errorPswd'] = 'Digite uma senha';
        header('Location: panelAdm.php');
        exit();
    } elseif ($_POST['idAdm'] != 0 || $_POST['idAdm'] != 1) {
        $_SESSION['error'] = 'Escolha entre 1 e 0';
        header('Location: panelAdm.php');
        exit();
    } else {
        $query = db()->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $_POST['email']
        ]);

        if (!$query->fetch()) {
            $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

            $query = db()->prepare("UPDATE users SET name = :name, email = :email, pswd = :pswd, idAdm = :idAdm WHERE id = :id");
            $query->execute([
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'pswd' => $hash,
                'idAdm' => $_POST['idAdm']
            ]);

            header('Location: panelAdm.php');
        } else {
            $_SESSION['errorEmail'] = 'Email ja cadastrado!';
        }
    }
}

// Atualizar o próprio usuario
if (isset($_POST['updateUser'])) {
    if (strlen($_POST['name']) == 0) {
        $_SESSION['errorName'] = 'Digite um nome';
        header('Location: panelAdm.php');
        exit();
    } elseif (strlen($_POST['email']) == 0) {
        $_SESSION['errorEmail'] = 'Digite um email';
        header('Location: panelAdm.php');
        exit();
    } elseif (strlen($_POST['pswd']) == 0) {
        $_SESSION['errorPswd'] = 'Digite uma senha';
        header('Location: panelAdm.php');
        exit();
    } else {
        $query = db()->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $_POST['email']
        ]);

        if (!$query->fetch()) {
            $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

            $query = db()->prepare("UPDATE users SET name = :name, email = :email, pswd = :pswd WHERE id = :id");
            $query->execute([
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'pswd' => $hash
            ]);

            header('Location: panelUser.php');
        } else {
            $_SESSION['errorEmail'] = 'Email ja cadastrado!';
        }
    }
}

// Atualizar um livro
if (isset($_POST['updateBook'])) {
    if (strlen($_POST['title']) == 0) {
        $_SESSION['errorTitle'] = 'Digite um titulo';
        header('Location: panelUser.php');
        exit();
    } elseif (strlen($_POST['author']) == 0) {
        $_SESSION['errorAuthorl'] = 'Digite um autor';
        header('Location: panelUser.php');
        exit();
    } elseif (strlen($_POST['desc']) == 0) {
        $_SESSION['errorDesc'] = 'Digite uma descrição';
        header('Location: panelUser.php');
        exit();
    } elseif (!isset($_FILES['img'])) {
        $_SESSION['errorImg'] = 'Envie uma imagem';
        header('Location: panelUser.php');
        exit();
    } else {
        $name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $extesion = pathinfo($name, PATHINFO_EXTENSION);
        $allowed_extensions = ['png', 'jpg', 'jpeg'];

        if (!in_array($extesion, $allowed_extensions)) {
            $_SESSION['errorImg'] = '.png, .jpg, .jpeg apenas!';
            header('Location: panelUser.php');
            exit();
        }

        $img = uniqid() . '.' . $extesion;
        move_uploaded_file($tmp_name, 'uploads/' . $img);

        $query = db()->prepare("UPDATE books SET title = :title, author = :author, desc = :desc, img = :img WHERE id = :id");
        $query->execute([
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'desc' => $_POST['desc'],
            'img' => $img
        ]);

        header('Location: index.php');
    }
}

// Adicionar um livro
if (isset($_POST['add'])) {
    if (strlen($_POST['title']) == 0) {
        $_SESSION['errorTitle'] = 'Digite um titulo';
        header('Location: add.php');
        exit();
    } elseif (strlen($_POST['author']) == 0) {
        $_SESSION['errorAuthor'] = 'Digite um autor';
        header('Location: add.php');
        exit();
    } elseif (strlen($_POST['desc']) == 0) {
        $_SESSION['errorDesc'] = 'Digite uma descrição';
        header('Location: add.php');
        exit();
    } elseif (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['errorImg'] = 'Envie uma imagem';
        header('Location: add.php');
        exit();
    } else {
        $name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $extesion = pathinfo($name, PATHINFO_EXTENSION);
        $allowed_extensions = ['png', 'jpg', 'jpeg'];

        if (!in_array($extesion, $allowed_extensions)) {
            $_SESSION['errorImg'] = '.png, .jpg, .jpeg apenas!';
            header('Location: add.php');
            exit();
        }

        $img = uniqid() . '.' . $extesion;
        move_uploaded_file($tmp_name, 'uploads/' . $img);

        $query = db()->prepare("INSERT INTO books (title, author, desc, img, idUser) VALUES (:title, :author, :desc, :img, :idUser)");
        $query->execute([
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'desc' => $_POST['desc'],
            'img' => $img,
            'idUser' => $_SESSION['id']
        ]);

        header('Location: index.php');
    }
}

// Excluir um usuario
if (isset($_POST['delUser'])) {
    $query = db()->prepare("DELETE FROM users WHERE id = :id");
    $query->execute([
        'id' => $_POST['id']
    ]);

    header('Location: panelAdm.php');
}

// Excluir um livro
if (isset($_POST['delBook'])) {
    $query = db()->prepare("DELETE FROM books WHERE id = :id");
    $query->execute([
        'id' => $_POST['id']
    ]);

    header('Location: index.php');
}

// Sair da conta do usuario
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}

// Saida de retorno
if (isset($_POST['null'])) {
    header('Location: index.php');
}
