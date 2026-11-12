# Cadastro de Eventos — .NET MAUI

Aplicativo desenvolvido em **.NET MAUI com C#, XAML e BindingContext** para realizar o cadastro e o gerenciamento básico de informações de eventos, conforme os requisitos da **agenda 15 de DS II**.

## 📋 Sobre o projeto

O aplicativo permite cadastrar eventos informando nome, data de início, data de término, número de participantes, local e custo por participante.

Os dados são associados a uma model chamada `Evento`, responsável por armazenar as informações e realizar automaticamente os cálculos da duração e do custo total.

Após preencher o formulário, o usuário pode concluir o cadastro e visualizar uma segunda tela com o resumo completo do evento, incluindo os valores calculados e as datas formatadas.

## 🗂 Estrutura dos arquivos

```text
MauiAppEventos/
├── Models/
│   └── Evento.cs
│
├── Views/
│   ├── CadastroEvento.xaml
│   ├── CadastroEvento.xaml.cs
│   ├── ResumoEvento.xaml
│   └── ResumoEvento.xaml.cs
│
├── App.xaml
├── App.xaml.cs
├── AppShell.xaml
├── AppShell.xaml.cs
└── MauiProgram.cs
```

## ⚙️ Como funciona

O aplicativo possui duas telas principais:

1. **Cadastro de Eventos:** apresenta um formulário para preencher os dados do evento, incluindo nome, datas, participantes, local e custo individual.
2. **Resumo do Evento:** apresenta todas as informações cadastradas, com a duração calculada e o custo total formatado em reais.

O fluxo de funcionamento é:

1. O usuário preenche os campos do formulário.
2. Os valores são associados às propriedades da model `Evento` por meio do `BindingContext`.
3. A model calcula automaticamente a duração do evento e o custo total.
4. Ao clicar em "Concluir cadastro", o método `Validar()` verifica se os dados são válidos.
5. Os dados são enviados para a página `ResumoEvento` por meio do construtor da classe.
6. A segunda tela utiliza o `BindingContext` para apresentar as informações do evento.
7. O botão "Novo cadastro" permite retornar à tela inicial do formulário.

## 🧩 Model Evento

A classe `Evento.cs`, localizada na pasta `Models`, representa os dados do evento e contém as propriedades:

| Propriedade | Tipo | Descrição |
|---|---|---|
| `Nome` | string | Nome do evento |
| `DataInicio` | DateTime | Data de início |
| `DataTermino` | DateTime | Data de término |
| `NumeroParticipantes` | int | Quantidade de participantes |
| `Local` | string | Local de realização |
| `CustoPorParticipante` | decimal | Custo individual |

A classe também implementa `INotifyPropertyChanged`, permitindo notificar a interface sempre que uma propriedade é modificada.

## 🔗 BindingContext e Data Binding

O `BindingContext` é utilizado para associar os elementos da interface gráfica às propriedades da model `Evento`.

Na tela de cadastro, o objeto é instanciado e definido como contexto de vinculação:

```csharp
private Evento _evento = new();

public CadastroEvento()
{
    InitializeComponent();
    BindingContext = _evento;
}
```

No XAML, os campos utilizam expressões de Binding para acessar as propriedades da model:

```xml
<Entry Placeholder="Nome do evento"
       Text="{Binding Nome}"/>

<DatePicker Date="{Binding DataInicio}"/>

<DatePicker Date="{Binding DataTermino}"/>
```

Dessa forma, os dados preenchidos pelo usuário são associados diretamente ao objeto `Evento`.

## 📅 Cálculo da duração com DateTime e TimeSpan

A duração do evento é calculada subtraindo a data de início da data de término.

A operação entre dois objetos `DateTime` retorna um objeto `TimeSpan`, que representa a diferença entre as datas:

```csharp
public TimeSpan Duracao => DataTermino - DataInicio;

public int DuracaoEmDias => Duracao.Days;
```

Para apresentar a duração de maneira mais detalhada, é utilizada a propriedade `DuracaoFormatada`:

```csharp
public string DuracaoFormatada =>
    $"{DuracaoEmDias} dia(s) ({Duracao:d\\.hh\\:mm\\:ss})";
```

Assim, o aplicativo consegue apresentar a quantidade de dias e a diferença de tempo no formato de `TimeSpan`.

## 💰 Cálculo do custo total

O custo total é calculado multiplicando o número de participantes pelo custo individual:

```csharp
public decimal CustoTotal =>
    NumeroParticipantes * CustoPorParticipante;
```

Por exemplo, considerando um evento com 30 participantes e custo de R$ 40,00 por pessoa:

| Descrição | Valor |
|---|---:|
| Participantes | 30 |
| Custo individual | R$ 40,00 |
| **Custo total** | **R$ 1.200,00** |

O tipo `decimal` é utilizado para representar valores monetários com maior precisão.

## 🛡️ Validação dos dados

A model `Evento` possui o método `Validar()`, responsável por verificar os dados antes de concluir o cadastro.

São verificadas as seguintes condições:

- O nome do evento não pode estar vazio.
- A data de término não pode ser anterior à data de início.
- O número de participantes deve ser maior que zero.
- O local do evento não pode estar vazio.
- O custo por participante não pode ser negativo.

Caso algum dado seja inválido, o aplicativo apresenta uma mensagem informando o problema.

## 🔄 Atualização automática dos cálculos

A implementação de `INotifyPropertyChanged` permite que a interface seja atualizada automaticamente quando os dados utilizados nos cálculos são modificados.

Quando uma propriedade como `DataInicio`, `DataTermino`, `NumeroParticipantes` ou `CustoPorParticipante` é alterada, a model notifica as mudanças nas propriedades calculadas:

- `Duracao`
- `DuracaoEmDias`
- `DuracaoFormatada`
- `CustoTotal`

Isso permite visualizar os resultados atualizados sem precisar realizar os cálculos manualmente na interface.

## 🛠 Tecnologias e recursos utilizados

- **C#:** implementação das classes, propriedades, métodos e cálculos.
- **.NET MAUI:** desenvolvimento da aplicação multiplataforma.
- **XAML:** construção das interfaces gráficas.
- **BindingContext:** associação entre a interface e a model.
- **Data Binding:** vinculação dos campos às propriedades do objeto.
- **INotifyPropertyChanged:** notificação de alterações nas propriedades.
- **DateTime:** manipulação das datas do evento.
- **TimeSpan:** cálculo e apresentação da duração.
- **decimal:** representação dos valores monetários.
- **Navigation:** navegação entre as páginas do aplicativo.
- **CultureInfo (pt-BR):** formatação de datas e valores monetários no padrão brasileiro.

## 🎓 Contexto acadêmico

Projeto desenvolvido como atividade prática da **agenda 15 de DS II**, com o objetivo de aplicar conceitos de desenvolvimento de aplicações utilizando .NET MAUI.

A atividade trabalha a criação de uma model de classe, associação de dados com `BindingContext`, utilização de `DateTime` e `TimeSpan` para cálculos de duração, cálculo de valores monetários e navegação entre páginas para apresentação dos dados cadastrados.