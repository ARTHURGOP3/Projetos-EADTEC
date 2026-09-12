
CREATE DATABASE BDLIVRARIA;
USE BDLIVRARIA;

CREATE TABLE autor (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nome_autor VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(50)
);

CREATE TABLE editora (
    id_editora INT PRIMARY KEY AUTO_INCREMENT,
    nome_editora VARCHAR(100) NOT NULL
);

CREATE TABLE livro (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    ano_publicacao INT,
    preco DECIMAL(10, 2) NOT NULL,
    id_autor INT,
    id_editora INT,
    FOREIGN KEY (id_autor) REFERENCES autor(id_autor),
    FOREIGN KEY (id_editora) REFERENCES editora(id_editora)
);

CREATE TABLE venda (
    id_venda INT PRIMARY KEY AUTO_INCREMENT,
    id_livro INT,
    data_venda DATE NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro)
);



-- Inserindo 8 registros na tabela 'autor'
INSERT INTO autor (nome_autor, nacionalidade) VALUES
('Carlos Drummond de Andrade', 'Brasileira'),
('Clarice Lispector', 'Brasileira'),
('George Orwell', 'Britânica'),
('J.R.R. Tolkien', 'Britânica'),
('Isaac Asimov', 'Russa'),
('Machado de Assis', 'Brasileira'),
('Stephen King', 'Americana'),
('Agatha Christie', 'Britânica');

-- Inserindo 3 registros na tabela 'editora'
INSERT INTO editora (nome_editora) VALUES
('Companhia das Letras'),
('Editora Rocco'),
('Aleph');

-- Inserindo 10 registros na tabela 'livro'
-- Os IDs de autor (1-8) e editora (1-3) são usados para criar os relacionamentos.
INSERT INTO livro (titulo, ano_publicacao, preco, id_autor, id_editora) VALUES
('A Revolução dos Bichos', 1945, 35.50, 3, 1),
('O Senhor dos Anéis', 1954, 120.00, 4, 2),
('Eu, Robô', 1950, 45.90, 5, 3),
('Dom Casmurro', 1899, 29.90, 6, 1),
('It: A Coisa', 1986, 89.90, 7, 2),
('O Assassinato no Expresso do Oriente', 1934, 39.99, 8, 1),
('A Hora da Estrela', 1977, 25.00, 2, 2),
('SQL para Iniciantes', 2023, 75.00, 1, 3),
('Fundamentos de Banco de Dados', 2024, 95.50, 3, 3),
('O Iluminado', 1977, 65.00, 7, 2);

-- Inserindo 15 registros na tabela 'venda'
-- Os IDs de livro (1-10) são usados para registrar as vendas.
INSERT INTO venda (id_livro, data_venda, quantidade) VALUES
(1, '2025-08-10', 2),
(3, '2025-08-10', 1),
(5, '2025-08-11', 3),
(2, '2025-08-12', 1),
(8, '2025-08-13', 5),
(9, '2025-08-14', 2),
(1, '2025-08-15', 1),
(4, '2025-08-16', 2),
(7, '2025-08-17', 1),
(10, '2025-08-18', 4),
(2, '2025-08-19', 1),
(8, '2025-08-20', 3),
(3, '2025-08-21', 2),
(6, '2025-08-22', 1),
(5, '2025-08-23', 2);
-- comandos de consulta
-- 1
select titulo, ano_publicacao from livro where ano_publicacao >= 2010;
-- 2 
select titulo, preco from livro order by preco desc;

-- 3 
select distinct nacionalidade from autor;

-- 4 
select livro.titulo, autor.nome_autor from livro 
inner join autor on livro.id_autor = autor.id_autor;

-- 5
select venda.data_venda, venda.quantidade, livro.titulo from venda
inner join livro on venda.id_livro = livro.id_livro;

-- 6
select max(preco), min(preco), avg(preco) from livro;

-- 7
select editora.nome_editora, count(livro.id_livro) from editora
left join livro on editora.id_editora = livro.id_editora
group by editora.nome_editora;