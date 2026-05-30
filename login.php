<?php
require "conexao.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $login->bindValue(':senha', $senha);
    $login->bindValue(':email', $email);
    $login->execute();
    $user = $login->fetch();

    if($user){
        $_SESSION['user_email'] = $user['email'];
        header("location: ./crud_categorias/categorias.php");
        exit();
    }else{
        header("location: index.php?msg=Login ou senha incorretos");
        exit();
    }

}
?>