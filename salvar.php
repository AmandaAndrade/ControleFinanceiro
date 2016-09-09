<?php
include "valida_sessao.inc";
include "conecta_banco.inc";
// Obtem o usuario que efetuou o login
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
// Obtem informacoes digitadas
$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$identidade = $_POST['identidade'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$estadocivil = $_POST['estadocivil'];
$funcao = $_POST['funcao'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$perfil = $_POST['perfil'];

// Validacao dos campos nome e valor.
if(empty($login) or empty($senha) or empty($nome) or empty($cpf) or empty($nascimento) or empty($funcao) or empty($email) or empty($telefone)){
	$erro = 1;
	$msg ="Por favor, preencha todos os campos obrigatorios.";
}else{
	// Tratamento da Descricao
	if (empty($identidade )){
	$identidade = NULL; 
	}
	// Id do usuario que efetuou o login
	$resultado = mysql_query("SELECT id FROM usuarios WHERE login='$nome_usuario'");
	$id_Usuario = mysql_result($resultado ,0,"id");
	// Data e Hora
	$datahora = date("Y-m-d H:i:s");
	// Comandos SQL para insercao na base de dados.
	$comandoSQL = "insert into usuarios(login, senha, nome, sexo, identidade, cpf, nascimento, estado_civil, funcao_empresa, email, telefone, perfil, cad_usuario, cad_datahora) values ('$login', md5('$senha'), '$nome', $sexo,'$identidade', '$cpf', '$nascimento', $estadocivil, '$funcao', '$email', '$telefone', $perfil, $id_usuario, '$datahora')";
	$resultado = mysql_query($comandoSQL) or die('Erro fatal durante operacao com base de dados');
	$msg ="Inclusão realizada com sucesso.";
}
mysql_close($con);
?>
<html>
<head>
<meta charset="utf-8">
<title>Controle de Finanças </title></head>
<body>
	<center>
		<img src="dinheiro.png" width="25%" height="30%"/>
	<h1>$$$ Sistema de Controle de Finanças $$$ </h1>
	<hr width="700px"/><br/>
	<?php
		echo "<p>".$msg." </p>";
	?>
	<p><a href='principal.php'>Voltar</a></p>
	</center>
</body>
</html>