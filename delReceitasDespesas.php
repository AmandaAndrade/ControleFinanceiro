<html>
<head>
<meta charset="utf-8"></head>
<?php
include "conecta_banco.inc";
if (isset($_GET['act']) == 'rem'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM receitas_despesas WHERE id = $id");
	echo "<script>alert('Apagado com sucesso!');";
	echo "location.href='deleteReceitasDespesas.php'</script>";
} else {
	echo "Você não selecionou um dado válido!";
	echo "<p align=\"center\"><a href =\"principal.php\">Voltar</a></p>";	
}

?>
</html>