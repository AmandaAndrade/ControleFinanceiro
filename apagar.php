<?php
include "conecta_banco.inc";
if($_GET['act'] == 'rem'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM receitas_despesas WHERE id = $id");
	echo "<script>alert('Apagado com sucesso!');";
	echo "location.href='excluirReceitasDespesas.php'</script>";
}
?>