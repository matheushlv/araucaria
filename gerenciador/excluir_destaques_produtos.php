<?php
include("conexao.php");
$idProduto = addslashes($_GET['idProduto']);
mysql_query("DELETE FROM produtos_destaque WHERE idProduto='$idProduto' ");
mysql_query("UPDATE produtos SET destaque='0' WHERE idProduto='$idProduto' ");
header("location:produtos.php?msg4=sucesso");
?>