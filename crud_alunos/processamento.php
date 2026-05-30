<?php
require "../conexao.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')){
    $nome_aluno = $_POST["nome_aluno"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $turma = $_POST["turma"];
    $data_nascimento = $_POST["data_nascimento"];

    if(empty($nome_aluno)){
        echo "Preencha o campo nome";
    }else{

    $add = $conn->prepare("INSERT INTO alunos_cadastrados (nome_aluno, email, telefone, turma, data_nascimento)
    VALUES (:nome_aluno, :email, :telefone, :turma, :data_nascimento)");
    $add->bindValue(':nome_aluno', $nome_aluno);
    $add->bindValue(':email', $email);
    $add->bindValue(':telefone', $telefone);
    $add->bindValue(':turma', $turma);
    $add->bindValue(':data_nascimento', $data_nascimento);
    $add->execute();
    
    header("location: alunos.php");
    }
}
?>

