# Listagem de Alunos Concluintes — PHP e MySQL

Sistema web desenvolvido para exibir as notas dos alunos concluintes, utilizando **PHP**, **MySQL**, **HTML** e **CSS**, conforme os conteúdos estudados na **Agenda 6 de PW II**.

## 📋 Sobre o projeto

O projeto consiste em uma página web capaz de consultar os dados dos alunos concluintes armazenados em um banco de dados MySQL e apresentá-los de forma organizada em uma tabela.

Para cada aluno, são exibidos:

* ID do aluno;
* Nome;
* Nota do módulo 1;
* Nota do módulo 2;
* Nota do módulo 3;
* Nota do módulo 4;
* Média das quatro notas.

O sistema também possui um campo de pesquisa que permite filtrar os alunos pelo nome.

## 🗂 Estrutura dos arquivos

```text
├── alunos.php    # Página principal, conexão com o banco,
│                 # pesquisa, cálculo das médias e exibição da tabela
```

## ⚙️ Como funciona

1. O usuário acessa a página `alunos.php`.
2. O sistema estabelece uma conexão com o banco de dados MySQL utilizando **MySQLi**.
3. É possível informar o nome de um aluno no campo de pesquisa.
4. O valor informado é recebido através do método `GET`.
5. O sistema realiza uma consulta na tabela `alunoconcluinte`, utilizando `LIKE` para localizar nomes correspondentes.
6. Os registros retornados são percorridos individualmente.
7. Para cada aluno, é calculada a média das quatro notas.
8. Os dados são apresentados em uma tabela HTML.
9. As médias individuais são armazenadas para posteriormente calcular a média geral da turma.

A conexão com o banco utiliza `localhost`, usuário `root` e o banco de dados `pwii`.

## 🔎 Busca por aluno

A página possui um formulário de pesquisa que utiliza o método `GET`. O campo recebe o nome `filtro` e mantém o valor pesquisado após o envio do formulário.

A consulta utiliza o filtro informado para procurar alunos pelo nome:

```php
$filtro = $_GET['filtro'] ?? '';
$sql = "SELECT * FROM alunoconcluinte WHERE nome LIKE '%$filtro%'";
```

Assim, é possível pesquisar por parte do nome do aluno.

## 📊 Exibição das notas

Os resultados da consulta são percorridos utilizando `foreach`. Para cada registro, o sistema apresenta o ID, nome, quatro notas e a média calculada.

A tabela possui as seguintes colunas:

| Coluna      | Informação              |
| ----------- | ----------------------- |
| ID do aluno | Identificação do aluno  |
| Nome        | Nome do aluno           |
| Nota1       | Nota do primeiro módulo |
| Nota2       | Nota do segundo módulo  |
| Nota3       | Nota do terceiro módulo |
| Nota4       | Nota do quarto módulo   |
| Média       | Média das quatro notas  |

## 🧮 Cálculo da média

A média individual é calculada somando as quatro notas do aluno e dividindo o resultado por quatro:

```php
$media = ($linha['nota1'] + $linha['nota2'] + $linha['nota3'] + $linha['nota4']) / 4;
$media = number_format($media, 1);
```

O resultado é formatado
