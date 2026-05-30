<?php
require "../conexao.php";
require "../auth.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')){
    $categoria = $_POST["categoria"];

    if(empty($categoria)){
        echo "Preencha o campo categoria";
    }else{

    $add = $conn->prepare("INSERT INTO categorias (categoria) VALUES (:categoria)");
    $add->bindValue(':categoria', $categoria);
    $add->execute();
    
    header("location: categorias.php");
    }
}
?>

