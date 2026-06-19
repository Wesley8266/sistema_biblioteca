<?php
require "../conexao.php";
require "../auth.php";
$id = $_GET['id'];

$editar = $conn->prepare("SELECT * FROM alunos WHERE id = ?");
$editar->execute([$id]);
$aluno = $editar->fetch();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_aluno = $_POST["nome_aluno"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $turma = $_POST["turma"];
    $data_nascimento = $_POST["data_nascimento"];

    $edit = $conn->prepare("UPDATE alunos SET nome_aluno = ?, email = ?, telefone = ?, turma = ?, data_nascimento = ? WHERE id = ?");
    $edit->execute([$nome_aluno, $email, $telefone, $turma, $data_nascimento, $id]);

    if(empty($nome_aluno) || empty($email) || empty($telefone) || empty($turma) || empty($data_nascimento)){
        header("location: editar_aluno.php?id=$id&msg=Preencha todos os campos!");
        exit();
    } else {
        header("location: alunos.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#2D241E] antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
       <aside class="w-64 bg-[#1E1814] text-white shadow-xl border-r border-[#4A3B31] flex flex-col">

            <div class="flex items-center justify-center gap-2 p-6 text-2xl font-bold border-b border-slate-700">
                <img class="w-16 rounded-2xl" src="../imagens/logo.png" alt="Logo">

                <div class="flex flex-col">
                    <span class="text-[#c9a84c]">Biblioteca</span>
                    <span class="text-[#A67C00]">Nexus</span>
                </div>
            </div>

           <nav class="flex flex-col justify-between flex-1 px-4 py-6">
                <ul class="space-y-2">
                    <li>
                        <a href="../dashboard/dashboard.php"
                           class="flex items-center gap-2 p-3 rounded-left-2xl rounded-r-full hover:bg-gray-700 font-semibold">
                            <img class="w-6" src="../imagens/dashboard.png" alt="Dashboard">
                            <span>Dashboard</span>
                        </a>    
                    <li>
                        <a href="../crud_categorias/categorias.php"
                           class="flex items-center gap-2 p-3 rounded-r-full font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/categorias.png" alt="Categorias">
                            <span>Categorias</span>
                        </a>
                    </li>

                    <li>
                        <a href="alunos.php"
                           class="flex items-center gap-2 p-3 rounded-r-full font-semibold bg-[#A67C00]">
                            <img class="w-6" src="../imagens/alunos.png" alt="Alunos">
                            <span>Alunos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../crud_livros/livros.php"
                           class="flex items-center gap-2 p-3 rounded-r-full font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/livros.png" alt="Livros">
                            <span>Livros</span>
                        </a>
                    </li>

                </ul>

                <div class="pt-6 border-t border-white/10">
                    <a href="../logout.php"
                       class="flex items-center justify-center gap-2 h-[60px] rounded-lg bg-[#4A0E0E] hover:bg-[#370A0A] text-white font-bold transition">
                        <span>Sair</span>
                        <img class="w-6" src="../imagens/voltar.png" alt="Sair">
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Conteúdo -->
    <main class="flex-1 flex items-center justify-center p-10">

        <form action="" method="post"
            class="flex flex-col items-center justify-center gap-5 bg-[#1a1311] border-2 border-[#3D2B1F] rounded-2xl p-2 shadow-2xl w-[900px] text-[#F8FAFC]">

            <div class="flex flex-col items-center mt-5">
                <img class="w-[60px] h-[60px] bg-[#2D241E] p-4 rounded-full" src="../imagens/editar_aluno.png">
                <h1 class="text-3xl text-center font-bold m-5 text-[#F8FAFC]">
                EDITAR INFORMAÇÕES DO ALUNO
                </h1>
            </div>

            <div class="flex align-items items-start flex-col gap-5">
                <div class="flex flex-row gap-2">
                    <img class="w-6" src="../imagens/pessoa.png">
                    <label for="nome_aluno" class="font-bold text-[#A67C00]">
                        Nome do aluno:
                    </label>
                </div>

                <input
                    type="text"
                    name="nome_aluno"
                    placeholder="Nome do aluno"
                    value="<?= $aluno['nome_aluno'] ?>"
                    class="border-2 border-black rounded-2xl p-4 w-[820px] text-[#F8FAFC] bg-[#1E1814]"
                    required>
            </div>

            <div class="flex flex-row gap-5 mt-5">
                
                <div class="flex flex-col gap-5">
                    <div class="flex flex-row gap-2">
                        <img class="w-6" src="../imagens/email.png">
                        <label for="email" class="font-bold text-[#A67C00]">EMAIL:</label>
                    </div>
                    <input
                        type="email"
                        name="email"
                        placeholder="Email do aluno"
                        class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                        value="<?= $aluno['email'] ?>"
                        required>

                    <div class="flex flex-row gap-2">
                        <img class="w-6" src="../imagens/telefone.png">
                        <label for="telefone" class="font-bold text-[#A67C00]">TELEFONE:</label>
                    </div>
                    <input
                        type="text"
                        name="telefone"
                        maxlength="11"
                        placeholder="8899******"
                        class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                        value="<?= $aluno['telefone'] ?>"
                        required>
                </div>
                
                <div class="flex flex-col gap-5">
                    <div class="flex flex-row gap-2">
                        <img class="w-6" src="../imagens/turma.png">
                        <label for="turma" class="font-bold text-[#A67C00]">TURMA:</label>
                    </div>
                    <input
                        type="text"
                        name="turma"
                        placeholder="Turma do aluno"
                        class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                        value="<?= $aluno['turma'] ?>"
                        required>

                    <div class="flex flex-row gap-2">
                        <img class="w-6" src="../imagens/data.png">
                        <label for="data_nascimento" class="font-bold text-[#A67C00]">DATA DE NASCIMENTO:</label>
                    </div>
                    <input
                        type="date"
                        name="data_nascimento" 
                        class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]" 
                        value="<?= $aluno['data_nascimento'] ?>"
                        required>
                </div>
            </div>
            <?php
                if(isset($_GET['msg'])){
                    echo "<p class='text-white text-center font-bold'>" . $_GET['msg'] . "</p>";
                }
            ?>
            <br>
                    <div class="flex flex-row justify-content items-center gap-5 mb-5 border-t border-[#3D2B1F] pt-5">
                        <button type="submit" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[400px]">
                            <span>Salvar</span>
                            <img class="w-6" src="../imagens/salvar.png">
                        </button>

                        <div class="flex flex-row justify-content items-center gap-5">
                            <a href="alunos.php" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[400px] hover:bg-[#370A0A]">
                                    <span>voltar</span>
                                    <img class="w-5 ml-2" src="../imagens/voltar.png">
                            </a>
                    </div>
                </div>
        </form>
    </main>

</body>
</html>