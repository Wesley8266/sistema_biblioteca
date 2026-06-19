<?php
require "../conexao.php";
require "../auth.php";

$id = $_GET['id'];

$verifica = $conn->prepare("SELECT COUNT(*) FROM livros WHERE id_categoria = ?");
$verifica->execute([$id]);

$totalLivros = $verifica->fetchColumn();

if ($totalLivros > 0) {
    header("Location: categorias.php?msg=Não é possível excluir esta categoria, pois existem livros vinculados a ela.");
    exit();
}

$delete = $conn->prepare("DELETE FROM categorias WHERE id = ?");
$delete->execute([$id]);

header("Location: categorias.php?msg=Categoria excluída com sucesso.");
exit();
