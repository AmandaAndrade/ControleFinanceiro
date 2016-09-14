<html>
<head><meta charset="utf-8"></head>
<?php
//obtem os valores digitados
$username = $_POST["username"];
// md5 - evitar que a senha do usuario seja armazenada limpa no banco.
$senha = md5($_POST["senha"]);
// acesso ao banco de dados
include "conecta_banco.inc";
$resultado = mysql_query("SELECT * FROM usuarios where login = '$username'");
$linhas = mysql_num_rows($resultado);
if($linhas == 0) {
	echo "<body>";
	echo "<p align =\"center\">Usuário não encontrado!</p>";
	echo "<p align =\"center\"><a href =\"index.html\">Voltar</a></p>";
	echo "</body>";
} else {
	if ($senha != mysql_result($resultado, 0, "senha")){
		echo "<body>";
		echo "<p align =\"center\">A senha está incorreta!</p>";
		echo "<p align =\"center\"><a href =\"index.html\">Voltar</a></p>";
		echo "</body>";
	} else {
		$id = mysql_result($resultado, 0, "id"); // id do usuario.
		$perfil = mysql_result($resultado, 0, "perfil"); // perfil do usuario.
		// Iniciar sessão.
		session_start ();
		$_SESSION['nome_usuario'] = $username;
		$_SESSION['senha_usuario'] = $senha;
		$_SESSION['perfil_usuario'] = $perfil;
		$_SESSION['id_usuario'] = $id;
		// direciona para a página] inicial do sistema.
		header ("Location: principal.php");
	}
}
// Encerrar conexão com o banco de dados.
mysql_close($con);
?>
</html>