<?php
require "../conexao.php";
require "../auth.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')){
    $categoria = $_POST["categoria"];

    if(empty($categoria)){
        header("location: criar_categoria.php?msg=Preencha o campo da categoria!");
        exit();
    }else{

    $add = $conn->prepare("INSERT INTO categorias (categoria) VALUES (:categoria)");
    $add->bindValue(':categoria', $categoria);
    $add->execute();
    
    header("location: categorias.php");
    }
}
?>

