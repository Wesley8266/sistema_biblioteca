<?php
require "../conexao.php";
require "../auth.php";

$id = $_GET['id'];

$excluir = $conn->prepare("DELETE FROM alunos_cadastrados WHERE id = ?");
$excluir->execute([$id]);

header("Location: alunos.php");
exit();

?>
