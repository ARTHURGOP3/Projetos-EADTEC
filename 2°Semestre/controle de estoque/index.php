<?php
    
    function statusEstoque($quantidade) 
    {
        if ($quantidade <= 2) {
            return "Comprar urgente!";
        } elseif ($quantidade <= 5) {
            return "Comprar em breve";
        } else {
            return "Estoque ok";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nome = $_POST["nomeproduto"];
        $preco = $_POST["precoproduto"];
        $qtdestoque = $_POST["nrestoque"];
        
        $estoque[] = [
            "nome" => $nome,
            "quantidade" => $qtdestoque,
            "preco" => $preco
        ];




        echo "<table>";
            echo "<tr>
                    <th>Nome do produto</th>
                    <th>Preço        a</th>
                    <th>  Quantidade em estoque</th>
                    <th>Status</th>
                </tr>";

            foreach ($estoque as $produto) {
                
                $mensagemStatus = statusEstoque($produto["quantidade"]);

                echo "<tr>
                        <td>{$produto['nome']}</td>
                        <td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>
                        <td>  {$produto['quantidade']}  </td>
                        <td>$mensagemStatus</td>
                    </tr>";
            }

            echo "</table>";
            
    }
    
?>
<a href="index.html">Voltar</a>