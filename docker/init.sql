USE sistema_biblioteca;

-- Usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Categorias
CREATE TABLE IF NOT EXISTS categorias (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(255) NOT NULL
);

-- Alunos
CREATE TABLE IF NOT EXISTS alunos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(191) NOT NULL,
    email VARCHAR(191) NOT NULL,
    telefone VARCHAR(10) NOT NULL,
    turma VARCHAR(20) NOT NULL,
    data_nascimento DATE NOT NULL
);

-- Livros
CREATE TABLE IF NOT EXISTS livros (
    id_livro INT(11) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(191) NOT NULL,
    autor VARCHAR(191) NOT NULL,
    ano_publicacao VARCHAR(10) NOT NULL,
    id_categoria INT(11) NOT NULL,

    CONSTRAINT fk_livro_categoria
        FOREIGN KEY (id_categoria)
        REFERENCES categorias(id)
);