<?php
require "../conexao.php";
require "../auth.php";
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
    <form action="processamento.php" method="post" class="flex flex-col items-center justify-center gap-5 bg-white rounded-3xl m-20 p-10 shadow-2xl shadow-green-500 w-[400px]">
        <h1 class="text-3xl text-center font-bold m-5 text-green-500 ">ADICIONAR LIVRO</h1>

            <label for="titulo_livro">Título:</label>
            <input type="text" name="titulo" id="titulo_livro" placeholder="Título do livro" class="border-2 border-black rounded-3xl p-4 w-60" required >

            <label for="autor_livro">Autor:</label>
            <input type="text" name="autor" id="autor_livro" placeholder="Autor do livro" class="border-2 border-black rounded-3xl p-4 w-60" required >
            
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" placeholder="Ano de publicação" class="border-2 border-black rounded-3xl p-4 w-60" required >
            
            <label for="id_categoria">Categoria:</label>
            <select name="id_categoria" id="id_categoria" class="border-2 border-black rounded-3xl p-4 w-60" required>
                <option value="">Selecione uma categoria</option>
                <?php
                $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
                foreach ($categorias as $categoria) {
                    echo "<option value='{$categoria['id']}'>{$categoria['categoria']}</option>";
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