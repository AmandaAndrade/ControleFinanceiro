<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
// Obtem o usuario que efetuou o login
$nome_usuario = $_SESSION["nome_usuario"];
// Obtem informacoes digitadas
$t = $_POST['t'];
$nome = $_POST['nome'];
$classe = $_POST['classe'];
$mesRef = $_POST['mesRef'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];

// Validacao dos campos nome e valor.
if(empty($nome) or empty($valor )){
	$erro =1;
	$msg ="Por favor, preencha todos os campos obrigatorios.";
}elseif (( substr_count($valor , '.')!=1) or (! is_numeric($valor ))){
	$erro =1;
	$msg ="Digitar o campo valor apenas com numeros e no formato (xx.xx).";
}else{
	// Tratamento da Descricao
	if (empty($descricao )){
	$descricao = NULL; 
	}
	// Id do usuario que efetuou o login
	$resultado = mysql_query("SELECT id FROM usuarios WHERE login='$nome_usuario'");
	$idUsuario = mysql_result($resultado ,0,"id");
	// Data e Hora
	$datahora= date("Y-m-d H:i:s");
	// Formatar o valor para duas casas decimais.
	$valor = number_format($valor, 2, '.', '');
	// Comandos SQL para insercao na base de dados.
	$comandoSQL = "insert into receitas_despesas(nome, tipo, classe, mes_referencia, datahora, valor, usuario, descricao) values ('$nome', $t, $classe, $mesRef,'$datahora', $valor, $idUsuario, '$descricao')";
	$resultado = mysql_query($comandoSQL) or die('Erro fatal durante operacao com base de dados');
	$msg ="Inclusão realizada com sucesso.";
}
mysql_close($con );
?>
<html>
<head>
<meta charset="utf-8">
<title>Controle de Finanças </title></head>
<body>
	<center>
		<img src="dinheiro.png" width="25%" height="30%"/>
	<h1>$$$ Sistema de Controle de Financas $$$ </h1>
	<hr width="700px"/><br/>
	<?php
		echo "<p>".$msg." </p>";
	?>
	<p><a href='principal.php'>Voltar</a></p>
	</center>
</body>
</html>