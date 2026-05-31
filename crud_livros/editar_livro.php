<?php
require "../conexao.php";
require "../auth.php";

$id = $_GET['id'];

$editar = $conn->prepare("SELECT * FROM livros WHERE id_livro = ?");
$editar->execute([$id]);
$livro = $editar->fetch();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = trim($_POST['ano_publicacao']);
    $id_categoria = $_POST['id_categoria'];

    $edit = $conn->prepare("UPDATE livros SET titulo = ?, autor = ?, ano_publicacao = ?, id_categoria = ? WHERE id_livro = ?");
    $edit->execute([$titulo, $autor, $ano_publicacao, $id_categoria, $id]);

    header("location: livros.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex flex-col justify-content items-center bg-gray-200" style="background-image: url('../imagens/fundo_sistema.png'); background-size: cover;">
    <form action="" method="post" class="flex flex-col items-center justify-center gap-5 bg-white rounded-3xl m-20 p-10 shadow-2xl shadow-green-500 w-[400px]">
        <h1 class="text-3xl text-center font-bold m-5 text-green-500 ">EDITAR LIVRO</h1>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Título do livro" value="<?= $livro['titulo'] ?>" class="border-2 border-black rounded-3xl p-4 w-60" required >
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" placeholder="Autor do livro" value="<?= $livro['autor'] ?>" class="border-2 border-black rounded-3xl p-4 w-60" required >
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" placeholder="Ano de publicação" value="<?= $livro['ano_publicacao'] ?>" class="border-2 border-black rounded-3xl p-4 w-60" required >
            <label for="id_categoria">Categoria:</label>
            <select name="id_categoria" id="id_categoria" class="border-2 border-black rounded-3xl p-4 w-60" required>
                <option value="">Selecione uma categoria</option>
                <?php
                $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
                foreach ($categorias as $categoria) {
                    echo "<option value='{$categoria['id']}' " . ($categoria['id'] == $livro['id_categoria'] ? 'selected' : '') . ">{$categoria['categoria']}</option>";
                }
                ?>
            </select>
        <button class="text-white rounded-3xl bg-green-400 p-4 w-60 hover:bg-green-500" type="submit">Salvar</button>
    </form>
        <a href="livros.php">
            <button class="text-white rounded-3xl bg-red-400 p-4 w-60 hover:bg-red-500 mb-10">
            Sair
            </button>
        </a>
</body>
</html>