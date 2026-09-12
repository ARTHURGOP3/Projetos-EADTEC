# Notas do 8º Ano A

**Agenda:** Agenda 5  
**Matéria:** Desenvolvimento de Sistemas II (DS II)

## Sobre o projeto

Este projeto consiste em uma página PHP para exibir as notas dos alunos do 8º Ano A em uma tabela.

Os dados da turma são armazenados em um array com o nome dos alunos e suas notas dos quatro bimestres. O projeto possui cinco alunos fictícios cadastrados. fileciteturn0file0L22-L27

## Funcionalidades

- Exibição dos alunos em uma tabela.
- Exibição das notas dos quatro bimestres.
- Cálculo da média de cada aluno.
- Formatação das médias com uma casa decimal.
- Destaque das médias:
  - **Verde:** média maior ou igual a 6,0.
  - **Vermelho:** média menor que 6,0.
- Cálculo e exibição da média geral da turma.

## Estrutura do projeto

O arquivo principal é:

```text
notas8A.php
```

O array `$alunos` contém os dados de cada estudante, organizados por nome e pelas quatro notas bimestrais. fileciteturn0file0L22-L27

## Funcionamento

A média de cada aluno é calculada somando as quatro notas e dividindo o resultado por quatro. Depois, o valor é formatado para apresentar uma casa decimal. fileciteturn0file0L38-L43

A estrutura `foreach` percorre cada aluno do array, calcula sua média e monta uma linha da tabela contendo o nome, as quatro notas e a média. fileciteturn0file0L38-L55

O programa utiliza uma estrutura `if/else` para verificar a média e aplicar a cor correspondente: verde para médias a partir de 6,0 e vermelho para médias abaixo de 6,0. fileciteturn0file0L44-L48

## Média da turma

O projeto também calcula a média geral da turma a partir das médias individuais armazenadas durante o processamento dos alunos. O resultado é exibido ao final da página. fileciteturn0file0L41-L43 fileciteturn0file0L60-L64

## Tecnologias utilizadas

- PHP
- HTML5
- CSS
- W3.CSS

A página utiliza a biblioteca W3.CSS para auxiliar na formatação da tabela e dos elementos HTML. fileciteturn0file0L3-L8

## Como executar

1. Tenha um ambiente com suporte a PHP, como o XAMPP.
2. Coloque o arquivo `notas8A.php` na pasta do servidor.
3. Inicie o servidor Apache.
4. Acesse o arquivo pelo navegador utilizando o `localhost`.

Exemplo:

```text
http://localhost/notas8A.php
```

## Resultado

Ao executar o projeto, o usuário visualiza uma tabela contendo os alunos, suas notas dos quatro bimestres e suas respectivas médias, com destaque visual conforme o resultado de cada aluno. A média geral da turma também é apresentada ao final.
