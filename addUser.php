<?php
include "valida_sessaoadmin.inc";
include "conecta_banco.inc";
$nome_usuario = $_SESSION["nome_usuario"];
$resultado = mysql_query ("SELECT id FROM usuarios WHERE login='$nome_usuario'");
$id = mysql_result($resultado,0,"id");
mysql_close($con);
?>
<html>
<head>
<meta charset="utf-8">
<title>Controle de Finanças </title></head>
<body>
	<center>
	<img src="dinheiro.png" width="15%"/>
	<h1>Sistema de Controle de Finanças Empresarial </h1>
	<hr width="700px"/><br/>
	Formulário para cadastro de novo usuário (*obrigatório)<br/><br/>
	<form method="post" action="saveUser.php" name="cadUser">
		<table>
			<tr>
				<td width="130px">Login*: </td>
					<td width="200px"><input size="50" type="text" name="login"></td>
			</tr>
			<tr>
				<td width="130px">Senha*: </td>
					<td width="200px"><input size="50" type="password" name="senha"></td>
			</tr>
			<tr>
				<td width="130px">Nome*: </td >
				<td width="200px"><input size="50" type="text" name="nome"></td>
			</tr>
			<tr>
				<td width="130px">Sexo*: </td>
					<td width="200px">
						<input type="radio" name="sexo" value="1" checked >Feminino
						<input type="radio" name="sexo" value="2" onclick="">Masculino
					</td>
			</tr>
			<tr>
				<td width="130px">Identidade: </td >
				<td width="200px"><input size="50" type="text" name="identidade"></td>
			</tr>
			<tr>
				<td width="130px">CPF*: </td >
				<td width="200px"><input size="50" type="text" name="cpf"></td>
			</tr>
			<tr>
				<td width="130px">Data de nascimento*: </td >
				<td width="200px"><input size="50" type="date" name="nascimento"></td>
			</tr>
			<tr>
				<td width="130px">Estado Civil*: </td>
					<td width="200px">
						<input type="radio" name="estadocivil" value="1" checked >Solteiro
						<input type="radio" name="estadocivil" value="2" checked >Casado
						<input type="radio" name="estadocivil" value="3" checked >Separado
						<input type="radio" name="estadocivil" value="4" checked >Divorciado
						<input type="radio" name="estadocivil" value="5" checked >Viuvo
						<input type="radio" name="estadocivil" value="6" onclick="">União Estável
					</td>
			</tr>
			<tr>
				<td width="130px">Função na empresa*: </td >
				<td width="200px"><input size="50" type="text" name="funcao"></td>
			</tr>
			<tr>
				<td width="130px">Email*: </td>
				<td width="200px">
					<input size="50" type="text" name="email"> (formato (etc@exemplo.com))
				</td>
			</tr>
			<tr>
				<td width="130px">Telefone*: </td>
				<td width="200px"><input size="50" type="text" name="telefone"></td>
			</tr>
			<tr>
				<td width="130px">Perfil*: </td>
					<td width="200px">
						<input type="radio" name="perfil" value="1" checked >Padrão
						<input type="radio" name="perfil" value="2" onclick="">Administrador
					</td>
			</tr>
			<tr>
				<td width="130px">
					<input type="button" value="Voltar" name="voltar" onclick="javascript:history.back ()">
				</td>
				<td width="200px">
					<input type="reset" value="Limpar">
					<input type="submit" value="Salvar">
					<input type="hidden" name="t" value=" <?php echo $t?>">
				</td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>