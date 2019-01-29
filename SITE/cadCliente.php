<?php
	// variáveis
	$codigo					= (int) $_POST["codigo"];
	$nomeCliente			= $_POST["nomeCliente"];
	$cpf					= $_POST["cpf"];
	$rg						= $_POST["rg"];
	$dataNasc				= $_POST["dataNasc"];
	
	$ativo=0;
	if ( isset($_POST["ativo"])  )
		$ativo = (int) $_POST["ativo"];
	
	$endereco				= $_POST["endereco"];
	$numCasa				= $_POST["numCasa"];
	$bairro					= $_POST["bairro"];
	$cidade					= $_POST["cidade"];
	$uf						= $_POST["uf"];
	$cep					= $_POST["cep"];
	$ddd					= $_POST["ddd"];
	$foneRes				= $_POST["foneRes"];
	$foneCel				= $_POST["foneCel"];
	$email					= $_POST["email"];
	$obs					= $_POST["obs"];
	
	// validar os dados 
	if ( strlen($nomeCliente) < 4 )
		die("Informe nome com no mínimo 4 caracteres.");
	
	if (  ($ativo <> 0) and ($ativo <> 1)  )
		die("Cliente ativo informado incorretamente.");
	
	// exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "Codigo: <b>$codigo</b> <br>";
	echo "Nome: <b>$nomeCliente</b> <br>";
	echo "CPF: $cpf<br>";
	echo "RG: $rg<br>";
	echo "Data de Nascimento: $dataNasc <br>";
	echo "Cliente Ativo?: $ativo <br>";
	echo "Endereco:  $endereco<br>";
	echo "Numero da Casa ou AP:  $numCasa<br>";
	echo "Bairro: $bairro<br>";
	echo "Cidade: $cidade<br>";	
	echo "UF: $uf<br>";
	echo "CEP: $cep<br>";
	echo "DDD: $ddd<br>";
	echo "Fone Residencial: $foneRes<br>";
	echo "Fone Celular: $foneCel<br>";
	echo "E-mail: $email<br>";
	echo "Observações:<br>";
	echo "$obs<br>";
	echo "<hr>";
	
	// 1 - Conectando no MYSQL (endereço: localhost)
	echo "<hr>";
	echo "1-Conectando no MYSQL (localhost)...<br>";
	
	$con = mysqli_connect(	"localhost" , "root", "" );
	
	echo "2-Abrindo o banco ....<br>";
	
	mysqli_select_db( $con , "supermercado") or 
		die("Erro na seleção do banco:" .
				mysqli_error($con) );
				
	echo "OK - Banco aberto. <br>"	;
	
	
	$sql = "INSERT INTO cliente 
	(	codigo,     nomeCliente,    cpf,    rg, 
		dataNasc,  ativo,  endereco,   numCasa, 
		bairro,     cidade,    uf,      cep,     ddd,    foneRes,
		foneCel,     email,     obs)
	VALUES (
		'$codigo', '$nomeCliente', '$cpf', '$rg', 
		'$dataNasc','$ativo', '$endereco', '$numCasa', 
		'$bairro', '$cidade', '$uf', '$cep', '$ddd', '$foneRes',
		'$foneCel', '$email', '$obs' )" ;
		
	//echo $sql ; // exibindo a variável na tela
	echo "<hr>";
	
	mysqli_query($con, $sql) 
		or die("Erro no Cadastro do cliente:" .
			mysqli_error($con) );
		
	echo "Cadastro de Cliente <b>$nomeCliente</b> finalizado!";
	echo "<br><a href='rotinas/listagemCliente.php'>Ver listagem dos dados</a>";
	echo "<br><a href='cadCliente.html'>Voltar</a>";
?>
