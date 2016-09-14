<html>
<head>
<meta charset="utf-8"></head>
<?php
include "valida_sessaoadmin.inc";
include "conecta_banco.inc";
if (isset($_GET['act']) == 'rem'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM usuarios WHERE id = $id");
	echo "<script>alert('Usuário apagado com sucesso!');";
	echo "location.href='deleteUser.php'</script>";
} else {
	echo "Você não selecionou um dado válido!";
	echo "<p align=\"left\"><a href =\"principal.php\">Voltar </a></p>";
}
?>
</html>