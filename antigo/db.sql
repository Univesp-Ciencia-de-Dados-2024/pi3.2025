CREATE DATABASE sistema_camara;
USE sistema_camara;

-- Tabela de munícipes
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    idade INT,
    sexo ENUM('M', 'F', 'O'),
    telefone VARCHAR(20),
    endereco VARCHAR(200),
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de projetos legislativos
CREATE TABLE projetos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descricao TEXT,
    data_votacao DATE
);

-- Tabela de votos dos cidadãos
CREATE TABLE votos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    projeto_id INT,
    aprovado BOOLEAN,
    justificativa TEXT,
    data_voto TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (projeto_id) REFERENCES projetos(id)
);
