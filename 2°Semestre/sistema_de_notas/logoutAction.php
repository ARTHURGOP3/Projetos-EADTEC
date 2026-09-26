<?php require_once ('verificarAcesso.php'); ?>
<?php
unset( $_SESSION['logado'] );
header("Location: index.php");
?>