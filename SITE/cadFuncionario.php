<!DOCTYPE html>
<html>
<head>
	<title>Mercado Cid</title>
	<style>
	.link{
		margin: 10px;
	}
	.link a{
		text-align: center;
	}
	</style>
</head>
<body>
<?php 

	$nomeFuncionario =  $_POST["nomeFuncionario"];
	$dataNasc =         $_POST["dataNasc"];
	$cargo =            $_POST["cargo"];
	$dataContratado =   $_POST["dataContratado"];
	$cpf =              $_POST["cpf"];
	$rg =               $_POST["rg"];
	$endereco =         $_POST["endereco"];
	$bairro =           $_POST["bairro"];
	$cidade =           $_POST["cidade"];
	$uf =               $_POST["uf"];
	$cep =              $_POST["cep"];
	$ddd =              $_POST["ddd"];
	$foneCel =          $_POST["foneCel"];
	$foneRes =          $_POST["foneRes"];
	$email =            $_POST["email"];
	$obs =              $_POST["obs"];
	$sexo =             $_POST["sexo"];
	$estadoCivil =      $_POST["estadoCivil"];
	$ativo = 0;           
	if(isset($_POST["ativo"]))
		$ativo = $_POST["ativo"];


	/* Conectando MySQL */

	$con = mysqli_connect('localhost','root','');
	$use = mysqli_select_db($con, 'supermercado') or die('Erro no MYSQL: ' . mysql_error($con));

	$inserirValues = "INSERT INTO funcionario(
	nomeFuncionario,
	dataNasc ,
	cargo,
	ativo,
	cpf,
	rg,
	sexo,
	estadoCivil,
	dataContratado,
	endereco, 
	bairro ,
	cidade, 
	uf, 
	cep, 
	ddd, 
	foneCel,
	foneRes,
	email,
	obs)
	VALUES('$nomeFuncionario','$dataNasc','$cargo','$ativo','$cpf','$rg','$sexo','$estadoCivil','$dataContratado',
	'$endereco','$bairro','$cidade','$uf','$cep','$ddd','$foneCel','$foneRes','$email','$obs');";

	
	echo "";

	mysqli_query($con,$inserirValues) or die("Erro na inserção de dados".mysqli_error($con));

?>
<h3 class="link">Funcionario cadastrado com sucesso</h3><a class="link" href="cadFuncionario.html"> Voltar </a> <a href="rotinas/listagemFuncionario.php" class="link"> Ver Listagem de Funcionários </a>
</body>
</html>

