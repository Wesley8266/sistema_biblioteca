<?php
require "../conexao.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')){

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $ano_publicacao = $_POST["ano_publicacao"];
    $id_categoria = $_POST["id_categoria"];

    if(empty($id_categoria) || empty($titulo) || empty($autor) || empty($ano_publicacao)){
        header("location: adicionar_livro.php?msg=Preencha todos os campos");
        exit();
    }else{

    $add = $conn->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, id_categoria) VALUES (:titulo, :autor, :ano_publicacao, :id_categoria)");
    
  
    $add->bindValue(':titulo', $titulo);
    $add->bindValue(':autor', $autor);
    $add->bindValue(':ano_publicacao', $ano_publicacao);
    $add->bindValue(':id_categoria', $id_categoria);
    $add->execute();
    
    header("location: livros.php");
    }
}
?>

