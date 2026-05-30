<?php
require "../conexao.php";
require "../auth.php";

$id = $_GET['id'];

$excluir = $conn->prepare("DELETE FROM categorias WHERE id = ?");
$excluir->execute([$id]);

header("Location: categorias.php");
exit();

?>
