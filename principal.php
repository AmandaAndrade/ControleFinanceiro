<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$perfil_usuario = $_SESSION["perfil_usuario"];
$resultado = mysql_query("SELECT * FROM usuarios WHERE login='$nome_usuario'");
$sexo = mysql_result($resultado ,0,"sexo");
$nome = mysql_result($resultado ,0,"nome");

mysql_close($con);

switch ($sexo) {
	case 1:
		$saud = "Olá, Sra. " . $nome;
		break;
	case 2:
		$saud = "Olá, Sr. " . $nome;
		break;
}
switch ($perfil_usuario) {
	case 1:
		$perfil = "Padrão";
		break;
	case 2:
		$perfil = "Administrador";
		break;
}
?>
<html>
<head>
<meta charset="utf-8">
<title> Controle de Finanças </title></head>
<body>
<form method="POST" action="login.php">
	<center>
	<img src="dinheiro.png" width="15%"/>
	<h1>Sistema de Controle de Finanças Empresarial</h1>
	<hr width="700px"/><br/>
	<?php echo $saud . " " . "[Perfil: ".$perfil."]";?> <a href="logout.php">Sair</a>
	<hr width="700px"/>
	<p>Favor, escolha a ação desejada:</p>
	<b>Incluir:</b><br/>
	<a href="addReceitasDespesas.php?t=1">Receitas</a><br/>
	<a href="addReceitasDespesas.php?t=2">Despesas</a><br/><br/>
	<b>Visualizar:</b><br/>
	Saldos Mensais: <a href="saldosMensais.php">[Planilha]</a><br/>
	<b>Excluir:</b><br/>
	<a href="deleteReceitasDespesas.php">Receitas e Despesas</a><br/><br/>
	<?php
	if ($perfil_usuario == 2){ ?>
			<b>Administração:</b><br/>
				<a href="addUser.php">Adicionar usuários</a><br/>
				<a href="deleteUser.php">Excluir usuários</a><br/><br/>
	<?php } ?>
	</center>
 </form>
 </body>
 </html>