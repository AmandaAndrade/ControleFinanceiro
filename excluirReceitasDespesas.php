<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$receita_despesa = mysql_query ("Select id, nome, tipo, classe, mes_referencia, valor from receitas_despesas");
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
		<th> Nome </th><th> Tipo </th><th> Classe </th><th> Mês </th><th> Valor </th>
		<?php
		$meses = array ("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
		while($linha = mysql_fetch_array($receita_despesa, MYSQL_ASSOC )){
				if ($linha["tipo"] == 1 && $linha["classe"] ==1){
					echo "<tr>";
					echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
					echo "<td align='center' width = '33%'> Receita </td>";
					echo "<td align='center' width = '33%'> Variavel </td>";
					echo "<td align='center' width = '33%'>" . $meses[$linha["mes_referencia"] - 1] . "</td>";
					echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
					echo "<td align='center' width = '33%'>" . "<a href='apagar.php?act=rem&id=$linha[id]'>Deletar</a>". "</td>";		
				} elseif ($linha["tipo"] == 1 && $linha["classe"] == 2){
					echo "<tr>";
					echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
					echo "<td align='center' width = '33%'> Receita </td>";
					echo "<td align='center' width = '33%'> Fixa </td>";
					echo "<td align='center' width = '33%'>" . $meses[$linha["mes_referencia"] - 1] . "</td>";
					echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
				echo "<td align='center' width = '33%'>" . "<a href='apagar.php?act=rem&id=$linha[id]'>Deletar</a>". "</td>";		
				} elseif ($linha["tipo"] == 2 && $linha["classe"] == 1){
					echo "<tr>";
					echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
					echo "<td align='center' width = '33%'> Despesa </td>";
					echo "<td align='center' width = '33%'> Variavel </td>";
					echo "<td align='center' width = '33%'>" . $meses[$linha["mes_referencia"] - 1] . "</td>";
					echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
					echo "<td align='center' width = '33%'>" . "<a href='apagar.php?act=rem&id=$linha[id]'>Deletar</a>". "</td>";		
				} elseif ($linha["tipo"] == 2 && $linha["classe"] == 2){
					echo "<tr>";
					echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
					echo "<td align='center' width = '33%'> Despesa </td>";
					echo "<td align='center' width = '33%'> Fixa </td>";
					echo "<td align='center' width = '33%'>" . $meses[$linha["mes_referencia"] - 1] . "</td>";
					echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
					echo "<td align='center' width = '33%'>" . "<a href='apagar.php?act=rem&id=$linha[id]'>Deletar</a>". "</td>";		
		} } ?>
	</table><br>
	<tr>
			<td><input type="button" value="Voltar" onClick="location.href='principal.php'"></td>
			<td></td>
		</tr>
	

</center>
</body>
</html>