# Sistema de Notas — PHP e MySQL

Sistema web desenvolvido para consultar e exibir as notas dos alunos concluintes, utilizando **PHP**, **MySQL**, **HTML** e **CSS**, conforme os conteúdos estudados na **Agenda 6 de PW II**.

## 📋 Sobre o projeto

O projeto consiste em um sistema web que permite consultar as notas dos alunos concluintes armazenadas em um banco de dados MySQL.

A aplicação possui uma tela de login para controlar o acesso ao sistema. Após a autenticação, o usuário pode visualizar uma tabela com os dados dos alunos, incluindo suas notas dos quatro módulos e a média individual.

O sistema também permite pesquisar alunos pelo nome e exibe a média geral da turma.

## 🗂 Estrutura dos arquivos

```text
├── sistema_de_notas/
│   ├── acessoNegado.php      # Exibe mensagem de acesso negado
│   ├── alunos.php            # Lista alunos, notas e médias
│   ├── cabecalho.php         # Cabeçalho HTML e importação de estilos
│   ├── conexaoBD.php         # Conexão com o banco de dados
│   ├── gabi.jpg              # Imagem utilizada na tela de login
│   ├── index.php             # Tela inicial de login
│   ├── loginAction.php       # Processa a autenticação do usuário
│   ├── logoutAction.php      # Encerra a sessão do usuário
│   ├── rodape.php            # Fechamento da estrutura HTML
│   └── verificarAcesso.php   # Verifica a autenticação da sessão
```

## ⚙️ Como funciona

1. O usuário acessa a página `index.php`, que apresenta o formulário de login.
2. Os dados de usuário e senha são enviados pelo método `POST` para `loginAction.php`.
3. O sistema consulta a tabela `usuario` no banco de dados e verifica as credenciais informadas.
4. Se a autenticação for válida, o nome do usuário é armazenado em uma sessão PHP.
5. O usuário é direcionado para `alunos.php`, onde pode visualizar a listagem de alunos.
6. A página consulta a tabela `alunoconcluinte` e exibe as notas e as médias individuais.
7. O usuário pode pesquisar alunos pelo nome utilizando um formulário com o método `GET`.
8. O sistema calcula e apresenta a média geral dos alunos retornados pela consulta.
9. Ao clicar em **Sair**, a sessão é encerrada e o usuário retorna à tela de login.

## 🔐 Sistema de autenticação

O sistema utiliza sessões PHP para controlar o acesso à página de listagem dos alunos.

O arquivo `loginAction.php` recebe os dados do formulário, consulta o banco de dados e verifica se o usuário e a senha correspondem a um registro existente.

O arquivo `verificarAcesso.php` verifica se existe uma sessão autenticada antes de permitir o acesso à página `alunos.php`.

O arquivo `logoutAction.php` encerra a sessão do usuário e redireciona para a página inicial.

## 🔎 Pesquisa por aluno

A página `alunos.php` possui um campo de pesquisa que permite filtrar os alunos pelo nome.

O formulário utiliza o método `GET`, recebendo o valor informado no campo `filtro`.

A consulta SQL utiliza o operador `LIKE` para localizar nomes que contenham o texto pesquisado.

```php
$filtro = $_GET['filtro'] ?? '';
$filtroEscapado = $conexao->real_escape_string($filtro);

$sql = "SELECT * FROM alunoconcluinte
        WHERE nome LIKE '%$filtroEscapado%'";
```

Dessa forma, é possível pesquisar um aluno informando seu nome completo ou apenas parte dele.

## 📊 Exibição das notas

Os dados são apresentados em uma tabela HTML com as seguintes colunas:

| Coluna      | Informação              |
| ----------- | ----------------------- |
| ID do aluno | Código de identificação |
| Nome        | Nome do aluno           |
| Nota1       | Nota do primeiro módulo |
| Nota2       | Nota do segundo módulo  |
| Nota3       | Nota do terceiro módulo |
| Nota4       | Nota do quarto módulo   |
| Média       | Média das quatro notas  |

O comando `foreach` percorre os registros retornados pela consulta SQL, permitindo exibir cada aluno individualmente.

## 🧮 Cálculo das médias

A média individual é calculada pela soma das quatro notas dividida por quatro.

```php
$media = (
    $linha['nota1'] +
    $linha['nota2'] +
    $linha['nota3'] +
    $linha['nota4']
) / 4;

$media = number_format($media, 1);
```

O resultado é formatado para apresentar uma casa decimal.

### Média geral da turma

As médias individuais são armazenadas em um array chamado `$soma`. Em seguida, o sistema utiliza `array_sum()` para somar os valores e divide o resultado pela quantidade de alunos encontrados.

```php
if (count($soma) > 0) {
    $mediaTurma = array_sum($soma) / count($soma);
    echo number_format($mediaTurma, 1);
}
```

Caso nenhum aluno seja encontrado, o sistema exibe uma mensagem informando que não há resultados.

## 🎨 Interface e estilização

A interface utiliza **W3.CSS** e regras de CSS personalizadas para organizar os elementos da página.

Entre os recursos utilizados estão:

* Tabelas estilizadas para apresentar as notas;
* Formulários para login e pesquisa;
* Botões com cores e estilos personalizados;
* Organização visual dos dados dos alunos;
* Estilização da média geral da turma.

## 🛠 Tecnologias

* **PHP:** processamento dos dados, autenticação, sessões e cálculos.
* **MySQL:** armazenamento dos dados dos alunos e usuários.
* **MySQLi:** conexão e execução de consultas no banco de dados.
* **HTML5:** estruturação das páginas e formulários.
* **CSS:** personalização visual da interface.
* **W3.CSS:** estilização de componentes e elementos da página.

## 🚀 Como executar o projeto

1. Instale e inicie um ambiente de desenvolvimento com PHP e MySQL, como o USBWebserver.
2. Coloque a pasta `sistema_de_notas` no diretório de projetos do servidor local.
3. Crie ou importe o banco de dados `pwii`.
4. Certifique-se de que as tabelas `usuario` e `alunoconcluinte` estejam criadas e preenchidas.
5. Confira as credenciais de conexão no arquivo `conexaoBD.php`.
6. Inicie o servidor Apache e o MySQL.
7. Acesse o arquivo `index.php` pelo navegador, utilizando o endereço local do servidor.
8. Informe as credenciais de um usuário cadastrado para acessar a listagem de alunos.

## 🎓 Contexto acadêmico

**Agenda:** Agenda 6

**Matéria:** Programação Web II (PW II)

**Competência:** Desenvolver sistemas para internet utilizando persistência em banco de dados, interface com o usuário e programação em lado servidor.

**Habilidades:**

* Codificar software em linguagem para web.
* Utilizar banco de dados relacionais para persistência dos dados.
* Utilizar interface baseada em navegador para interação com o usuário.
