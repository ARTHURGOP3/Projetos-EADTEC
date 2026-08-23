# Gerenciamento de Estoque — Exemplo em PHP

Exemplo de aplicação desenvolvido para demonstrar o uso de **estruturas de repetição** e **funções** em PHP, conforme conteúdo estudado em sala.

## 📋 Sobre o projeto

O sistema simula um cadastro simples de produtos em um estoque. O usuário preenche um formulário HTML com os dados de um novo produto, que é enviado via **POST** para um script PHP. Esse script adiciona o novo produto a uma lista de produtos já existentes e exibe uma tabela com todos os itens, incluindo um status automático de reposição para cada um.

## 🗂 Estrutura dos arquivos

```
├── cadastro.html   # Formulário de cadastro de produto (nome, preço, quantidade)
└── processa.php    # Processa o POST, monta a lista de produtos e exibe a tabela
```

## ⚙️ Como funciona

1. O usuário preenche o formulário em `cadastro.html` com nome, preço e quantidade do produto.
2. Ao enviar, os dados são recebidos via `$_POST` em `processa.php`.
3. O novo produto é adicionado a um array de produtos já existentes no estoque (array de arrays associativos).
4. O script percorre todos os produtos e monta uma tabela com nome, preço, quantidade e status de estoque.

## 🔁 Estrutura de repetição

O `foreach` é usado para percorrer o array `$estoque`, processando um produto por vez sem precisar controlar índices manualmente:

```php
foreach ($estoque as $produto) {
    // processa cada produto do array
}
```

## 🧩 Função

A função `statusEstoque()` recebe a quantidade de um produto e devolve uma mensagem indicando se é necessário repor o item. Ela é chamada uma vez para cada produto dentro do `foreach`, evitando repetir a mesma lógica de decisão várias vezes no código:

```php
function statusEstoque($quantidade) {
    if ($quantidade <= 2) {
        return "Comprar urgente!";
    } elseif ($quantidade <= 5) {
        return "Comprar em breve";
    } else {
        return "Estoque ok";
    }
}
```

## 📐 Regras de status do estoque

| Quantidade | Status            |
|------------|--------------------|
| ≤ 2        | Comprar urgente!   |
| 3 a 5      | Comprar em breve   |
| > 5        | Estoque ok         |

## 🛠 Tecnologias

- PHP (formulário, `$_POST`, arrays, `foreach`, funções)
- HTML + w3.css (interface do formulário)

## 🎓 Contexto acadêmico

Projeto desenvolvido como exemplo de aplicação própria para demonstrar estruturas de repetição e funções em PHP, com organização das ideias e decisões complementada por um mapa mental digital.
