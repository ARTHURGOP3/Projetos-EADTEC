<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $valorCompra = $_POST["txtValorCompra"];
        $formaPagamento = $_POST["cmbPag"];
        $desconto = 0;

        if ($formaPagamento == "cartaoCredito") {
            $desconto = 0;
            $valor_final = $valorCompra - $desconto;
            $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') . " foi realizada com cartão de crédito. Não há desconto. O valor final da compra é de R$ " . number_format($valor_final, 2, ',', '.');
        } elseif ($formaPagamento == "boleto") {
            $desconto = $valorCompra * 0.08;
            $valor_final = $valorCompra - $desconto;
            $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') . " foi realizada com boleto. Seu desconto é de R$ " . number_format($desconto, 2, ',', '.') . ". O valor final da compra é de R$ " . number_format($valor_final, 2, ',', '.');
        } elseif ($formaPagamento == "deposito") {
            $desconto = $valorCompra * 0.1;
            $valor_final = $valorCompra - $desconto;
            $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') . " foi realizada com depósito. Seu desconto é de R$ " . number_format($desconto, 2, ',', '.') . ". O valor final da compra é de R$ " . number_format($valor_final, 2, ',', '.');
        } else {
            $mensagem = "Forma de pagamento inválida.";
        }

        echo "<div class='w3-panel w3-brown'>$mensagem</div>";
    }
    /*
    COMENTÁRIO REFLEXIVO:

    primeiro investiguei o código e notei que os descontos de boleto
    e depósito estavam trocados
    corrigi o depósito para 10% e o boleto para 8%. O cartão de
    crédito ficou sem desconto
    depois calculei o valor final subtraindo o desconto do valor
    da compra
    também usei number_format para mostrar os valores com duas
    casas decimais
    o html ficou responsável pelo formulário junto com css interno do w3schools da página html e o PHP pelo cálculo e exibição do resultado.
    */

?>
<a href="index.html">Voltar</a>