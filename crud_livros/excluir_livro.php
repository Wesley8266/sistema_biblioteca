<?php

require "../conexao.php";

$id = $_GET['id'];

$excluir = $conn->prepare("DELETE FROM livros WHERE id_livro = ?");
$excluir->execute([$id]);

header("Location: livros.php");
exit();

?>
