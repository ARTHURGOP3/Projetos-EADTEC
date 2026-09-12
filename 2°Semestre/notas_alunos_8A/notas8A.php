<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notas alunos 8A</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        </head>
    <body class="w3-center">
        <table style="margin: 0 auto;">
             <tr>
                <th class='w3-center'>Aluno</th>
                <th class='w3-center'>Bimestre 1</th>
                <th class='w3-center'>Bimestre 2</th>
                <th class='w3-center'>Bimestre 3</th>
                <th class='w3-center'>Bimestre 4</th>
                <th class='w3-center'>Média</th>
            </tr>


            <?php
                $alunos = [
                    ['aluno'=>"Gabriel", 'bim1'=>8, 'bim2'=>7, 'bim3'=>9, 'bim4'=>6],
                    ['aluno'=>"João", 'bim1'=>10, 'bim2'=>10, 'bim3'=>10, 'bim4'=>9.75],
                    ['aluno'=>"Maria", 'bim1'=>6, 'bim2'=>7, 'bim3'=>8, 'bim4'=>9],
                    ['aluno'=>"Giovana", 'bim1'=>10, 'bim2'=>7, 'bim3'=>8, 'bim4'=>9],
                    ['aluno'=>"Matheus", 'bim1'=>5, 'bim2'=>4, 'bim3'=>3, 'bim4'=>2],
                ];
                
                   /*
                        O foreach percorre cada aluno dentro do array $alunos, um de cada vez.
                        A cada volta, ele calcula a média das 4 notas do bimestre daquele aluno,
                        formata com uma casa decimal e guarda o valor num array auxiliar ($soma)
                        para depois calcular a média da turma. Também monta e imprime a linha
                        da tabela (<tr>) daquele aluno, já com a média colorida em verde ou vermelho.
                    */
                
                foreach ($alunos as $aluno) 
                {
                    $nome = $aluno['aluno'];
                    $media = ($aluno['bim1'] + $aluno['bim2'] + $aluno['bim3'] + $aluno['bim4']) / 4;
                    $media = number_format($media, 1);
                    $soma[] = $media;
                    if ($media >= 6) {
                        $media = "<span style='color: green;'>" . $media . "</span>";
                    } else {
                        $media = "<span style='color: red;'>" . $media . "</span>";
                    }
                    echo "<tr>";
                    echo "<td class='w3-center' >" . $aluno['aluno'] . "</td>";
                    echo "<td class='w3-center' >" . $aluno['bim1'] . "</td>";
                    echo "<td class='w3-center' >" . $aluno['bim2'] . "</td>";
                    echo "<td class='w3-center' >" . $aluno['bim3'] . "</td>";
                    echo "<td class='w3-center' >" . $aluno['bim4'] . "</td>";
                    echo "<td class='w3-center' >" . $media . "</td>";
                    echo "</tr>";
                }
            ?>

        </table>
        <h2 class='w3-center'> Média da Turma
        <?php
             $mediaTurma = array_sum($soma) / count($alunos);
            echo ": <div>" . number_format($mediaTurma, 1) . "</div></h2>";
        ?>
        </body>
</html>