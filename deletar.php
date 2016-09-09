<?php
include "conecta_banco.inc";
if($_GET['act'] == 'rem'){
	$id = $_GET['id'];
	mysql_query("DELETE FROM usuarios WHERE id = $id");
	echo "<script>alert('Usuário apagado com sucesso!');";
	echo "location.href='delUser.php'</script>";
}
?>