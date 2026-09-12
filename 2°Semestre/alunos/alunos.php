<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notas alunos 8A</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- aqui css para costumizar -->
        <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: teal;
                    margin: 0;
                    padding: 20px;
                }

                h1 {
                    text-align: center;
                    color: white;
                    background-color: teal;
                    width: 30%;
                    margin-left: 35%;
                    padding: 10px;
                    border-radius: 20px;

                }

                table {
                    
                    text-align: center;
                    margin-left:5%;
                    width: 90%;
                    background-color: #f1edf1;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

                }

                div {
                    margin: 20px;
                    text-align: center;
                    font-size: 20px;
                    background-color: white;
                    color: teal;

                }

                td {
                    background-color: #ffffff;
                    text-align: center;
                    border-radius: 2px;
                }
                td:hover {
                    background-color: white;
                    text-align: center;
                    border-radius: 2px;
                }

                
                th {
            
                    color: teal;
                    background-color: white;
                    border: 1px solid teal;
                    border-radius: 2px;
                }

                h2 {
                    border: 1px solid white;
                    background-color: teal;
                    color: white;
                    padding: 10px;
                    width: 25%;
                    margin-left: 37%;
                    text-align: center;
                    border-radius: 20px;
                    position: absolute;
                    left: 300px;
                }
            
        </style>
    </head>
        <body class="w3-center">

            <form method="GET" action="" class="w3-form">
                <input class="w3-input" type="text" name="filtro" placeholder="Pesquisar por nome do aluno"value="<?php echo htmlspecialchars($_GET['filtro'] ?? ''); ?>" >
                <button class="w3-input" type="submit">Pesquisar</button>
            </form>
                    <?php
                        $servername = "localhost"; 
                        $username = "root"; 
                        $password = ""; 
                        $dbname = "pwii"; 
                        // Cria a conexão com o banco usando MySQLi
                        $conexao = new mysqli($servername, $username, $password, $dbname); 
                        if ($conexao->connect_error) { 
                            die("Connection failed: " . $conexao->connect_error); 
                        }  
                        $filtro = $_GET['filtro'] ?? '';
                        $sql = "SELECT * FROM alunoconcluinte WHERE nome LIKE '%$filtro%'";
                            // criando a tabela 
                            echo ' 
                            <div class="w3-paddingw3-content w3-half w3-displaytopmiddle w3-margin"> 
                                <h1 class="w3-center w3-teal w3-round-large w3margin">
                                    Listagem de Alunos
                                </h1> 
                                <table class="w3-table-all w3-centered"> 
                                <thead>    
                                    <tr class="w3-center w3-teal"> 
                                        <th>Id do aluno</th> 
                                        <th>Nome</th> 
                                        <th>Nota1</th> 
                                        <th>Nota2</th> 
                                        <th>Nota3</th> 
                                        <th>Nota4</th>
                                        <th>Média</th> 
                                    </tr> 
                                <thead> 
                                '; 
                             // Busca todos os registros da tabela alunoconcluinte
        
                            $resultado = $conexao->query($sql); 
                            if($resultado != null) 
                            // Percorre cada aluno retornado pela consulta, um por vez
                            foreach($resultado as $linha) { 
                                // Calcula a média das 4 notas do aluno atual e formata com 1 casa decimal
                                $media = ($linha['nota1'] + $linha['nota2'] + $linha['nota3'] + $linha['nota4']) / 4;
                                $media = number_format($media, 1);
                                // Guarda essa média no array $soma, para depois calcular a média geral da turma
                                $soma[] = $media;
                                echo '<tr>'; 
                                    echo '<td>'
                                            .$linha['idalunoconcluinte'].'
                                        </td>'; 
                                    echo '<td>'
                                            .$linha['nome'].
                                        '</td>'; 
                                    echo '<td>'
                                            .$linha['nota1'].
                                        '</td>'; 
                                    echo '<td>'
                                            .$linha['nota2'].
                                        '</td>'; 
                                    
                                    echo '<td>'
                                            .$linha['nota3'].
                                        '</td>';
                                    
                                    echo '<td>'
                                            .$linha['nota4'].
                                        '</td>';  
                                    echo '<td>'
                                        .$media.
                                    '</td>';  
                                echo '</tr>'; 
                            } 
                            echo ' 
                                </table> 
                            </div>'
                            ; 
                        $conexao->close(); 
                    ?>
                <h2 > Média da Turma
                <?php
                // aqui o calculo pelo array para mostrar a media da turma
                    $mediaTurma = array_sum($soma) / count($soma);
                    echo ": <div>" . number_format($mediaTurma, 1) . "</div></h2>";
                ?>
        </body>
</html>