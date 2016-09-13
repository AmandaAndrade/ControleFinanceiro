<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$receita = mysql_query ("Select nome, tipo, classe, valor from receitas_despesas");
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
		<th> Nome </th><th> Função na empresa </th> <th> </th>
		<?php
		while($linha = mysql_fetch_array($user, MYSQL_ASSOC )){		
				echo "<tr>";
				echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
				echo "<td align='center' width = '33%'>" . $linha["tipo"] . "</td>";
				echo "<td align='center' width = '33%'>" . $linha["classe"] . "</td>";
				echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
				echo "<td align='center' width = '33%'>" . "<a href='apagar.php?act=rem&nome=$linha[nome]&tipo=$linha[id]&classe=$linha[classe]'>Deletar</a>". "</td>";		
		} ?>
	</table><br>
	<tr>
			<td><input type="button" value="Voltar" onClick="location.href='principal.php'"></td>
			<td></td>
		</tr>
	

</center>
</body>
</html>