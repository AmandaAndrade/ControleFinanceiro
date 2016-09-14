<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
$mes = $_GET['mes'];
$meses = array ("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
$resRecVar = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 1 and mes_referencia = $mes and tipo = 1 and usuario = $id_usuario");
$resDesVar = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 1 and mes_referencia = $mes and tipo = 2 and usuario = $id_usuario");
$resRecFix = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 2 and tipo = 1 and usuario = $id_usuario");
$resDesFix = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 2 and tipo = 2 and usuario = $id_usuario");
// Valores Totais Receitas e Despesas
$recVarTotal = 0; $recFixTotal = 0; $desVarTotal = 0; $desFixTotal = 0;
mysql_close($con);
?>
<?php if (isset($mes)){ ?>
<html>
<head>
<meta charset="utf-8">
<title>Controle de Finanças </title>
</head>
<body>
	<center>
	<img src="dinheiro.png" width="15%"/>
	<h1>Sistema de Controle de Finanças Empresarial </h1>
	<hr width="700px"/>
	<b>Lista de RECEITAS - Mês de <?php echo $meses[$mes -1]?></b><br><br>Fixas
	<hr width="700px"/>
	<table width = "700px" border = "0px">
		<th> Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$)</th>
		<?php
		while($linha = mysql_fetch_array($resRecFix, MYSQL_ASSOC )){
			echo "<tr>";
			echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["datahora"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
			echo "</tr>";
			// Incrementar o valor total
			$recFixTotal = $recFixTotal + $linha["valor"]; } ?>
		<tr>
			<td width = "33%"></td><td align='center' width = "33%"><b>Total: </b></td>
			<td align='center'> <?php echo $recFixTotal; ?> </td>
		</tr>
	</table><br>
	Variáveis
	<hr width="700px"/>
	<table width = "700px" border = "0px">
		<?php
		while($linha = mysql_fetch_array($resRecVar , MYSQL_ASSOC )){
			echo "<tr>";
			echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["datahora"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
			echo "</tr>";
			// Incrementar o valor total
			$recVarTotal = $recVarTotal + $linha["valor"]; } ?>
		<tr>
			<td width ='33%'></td><td align='center' width = "33%"><b>Total: </b></td>
			<td align='center'> <?php echo $recVarTotal; ?> </td>
		</tr>
	</table><br/>
	<hr width="700px"/>
	<b>Lista de DESPESAS - Mês de <?php echo $meses[$mes -1]?></b><br/><br/>Fixas
	<hr width="700px"/>
	<table width = "700px" border = "0px">
		<th> Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$)</th>
		<?php
		while($linha = mysql_fetch_array($resDesFix , MYSQL_ASSOC )){
			echo "<tr>";
			echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["datahora"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
			echo "</tr>";
			// Incrementar o valor total
			$desFixTotal = $desFixTotal + $linha["valor"]; } ?>
		<tr>
			<td width = "33%"></td><td align='center' width = '33%'><b>Total: </b></td>
			<td align='center'> <?php echo $desFixTotal; ?> </td>
		</tr>
	</table><br/>
	Variáveis
	<hr width="700px" />
	<table width = "700px" border = "0px">
		<?php
		while($linha = mysql_fetch_array($resDesVar , MYSQL_ASSOC )){
			echo "<tr>";
			echo "<td align='center' width = '33%'>" . $linha["nome"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["datahora"] . "</td>";
			echo "<td align='center' width = '33%'>" . $linha["valor"] . "</td>";
			echo "</tr>";
			// Incrementar o valor total
			$desVarTotal = $desVarTotal + $linha["valor"]; } ?>
		<tr>
			<td width ='33%'></td><td align='center' width = '33%'><b>Total: </b></td>
			<td align='center'> <?php echo $desVarTotal; ?> </td>			
		</tr>
	</table><br/>
	<b>SALDO </b>
	<hr width="700px"/>
	<table width ="700px" border = "0px">
		<tr>
			<td width="50%">Receitas: </td>
			<td align="right" width="50%"><?php echo "($recFixTotal+$recVarTotal)"?>
		</tr>
		<tr>
			<td width="50%">Despesas: </td>
			<td align="right" width="50%"><?php echo "($desFixTotal+$desVarTotal)" ?>
		</tr>
		<tr>
			<td width="50%">Saldo: </td>
			<td align="right" width="50%"><b><?php $saldo=($recFixTotal+$recVarTotal)-($desFixTotal+$desVarTotal); echo "R$ " . $saldo ?>
		</tr>
		<tr>
			<td><input type="button" value="Voltar" onClick="location.href='principal.php'"></td>
			<td></td>
		</tr>
	</table>
<?php 
}
?>
</center>
</body>
</html>