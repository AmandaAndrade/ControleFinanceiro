<?php
include "valida_sessaoadmin.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$user = mysql_query ("Select id, nome, funcao_empresa, perfil from usuarios");
mysql_close($con);
?>
<html>
<head>
<meta charset="utf-8">
<title>Controle de Finanças </title>
</head>
<body>
	<center>
	<img src="dinheiro.png" width="15%"/>
	<h1>Sistema de Controle de Finanças Empresarial </h1>
	<hr width="700px"/><br/>
	<table width = "700px" border = "0px">
		<th> Nome </th><th> Função na empresa </th> <th> Perfil </th>
		<?php
		$perfis = array("Padrão", "Administrador");
		while($linha = mysql_fetch_array($user, MYSQL_ASSOC )){
			if ($linha["id"] != $id_usuario){	
				echo "<tr>";
				echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
				echo "<td align='center' width = '33%'>" . $linha["funcao_empresa"] . "</td>";
				echo "<td align='center' width = '33%'>" . $perfis[$linha["perfil"] - 1] . "</td>";
				echo "<td align='center' width = '33%'>" . "<a href='delUser.php?act=rem&id=$linha[id]'>Deletar</a>". "</td>";
			}		
		} ?>
	</table><br>
	<tr>
		<td><input type="button" value="Voltar" onClick="location.href='principal.php'"></td>
		<td></td>
	</tr>
	

</center>
</body>
</html>