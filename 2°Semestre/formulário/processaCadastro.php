<?php
$nome = $_POST["nome"];
$idade = $_POST["idade"];
$profissao = $_POST["profissao"];
$salario = $_POST["salario"];
$experiencia = $_POST["experiencia"];
echo "<p>"."Olá, ".$nome."<br>"." Obrigado pela sua candidatura para a vaga de desenvolvedor: ".$profissao."<br>"." Leia seus dados e veja se estão corretos ".
"<br>"." Idade: ".$idade."<br>"." Pretensão Salarial ".$salario. "<br>"." Sua experiencia: ".$experiencia ."</p>";
echo '<a href="cadastro.html">Voltar ao formulário</a>';
?>