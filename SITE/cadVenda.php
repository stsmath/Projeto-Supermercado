<?php
	// Criando as vari�veis
	$codVenda		= (int)$_POST["codVenda"];
	$codCliente		= (int)$_POST["codCliente"];
	$codCaixa		= (int)$_POST["codCaixa"];
	$codFuncionario	= (int) $_POST["codFuncionario"];
	$codEstoque		= (int)$_POST["codEstoque"];
	$nomeTransport	= $_POST["nomeTransport"];
	$dataVenda		= $_POST["dataVenda"];
	$valorBruto	    = (float)$_POST["valorBruto"];
	$desconto	    = (float)$_POST["desconto"];
	$frete	   		= (float)$_POST["frete"];
	$valorFinal	    = (float)$_POST["valorFinal"];
	$formaPag	    = $_POST["formaPag"];
	$parcelamento	= $_POST["parcelamento"];
	$valorJuros	    = (float)$_POST["valorJuros"];
	$entregue=0;
	
	if ( isset($_POST["entregue"])  )
		$entregue = (int) $_POST["entregue"];

	// Validando os dados
	if ( $codCliente == "")
		die("C�digo do cliente deve ser infomado.");
	
	if ( $codCaixa == "")
		die("C�digo do caixa deve ser infomado.");
	
	if ( $codFuncionario == "")
		die("C�digo do funcion�rio deve ser infomado.");
	
	if ( $codEstoque == "")
		die("C�digo do estoque deve ser infomado.");
	
	if ( strlen($nomeTransport) <2 )
		die("Informe nome com no m�nimo 2 caracteres.");
	
	if ( $dataVenda == "")
		die("A data da venda deve ser informada.");
	
	if ($valorBruto <= 0)
		die("O valor bruto deve ser informado.");
	
	if ($frete <= 0)
		die("O frete deve ser informado.");
	
	if ($valorFinal <= 0)
		die("O valor final deve ser informado.");
	
	if ( $formaPag == "")
		die("A forma de pagamento deve ser informada.");
	
	if (  ($entregue <> 0) and ($entregue <> 1)  )
		die("Entregue informado incorretamente.");
	// Exibindo os dados
	echo "<h2>Dados Recebidos</h2>";
	echo "C�digo da venda: <b>$codVenda</b> <br>";
	echo "C�digo do cliente: $codCliente<br>";
	echo "C�digo do caixa: $codCaixa<br>";
	echo "C�digo do funcion�rio: $codFuncionario <br>";
	echo "C�digo do produto no estoque: $codEstoque <br>";
	echo "Nome da transportadora:  $nomeTransport<br>";
	echo "Data da venda:  $dataVenda<br>";
	echo "Valor bruto: R$ $valorBruto<br>";
	echo "Desconto: R$ $desconto<br>";
	echo "Frete: R$ $frete<br>";
	echo "Valor final: R$ $valorFinal<br>";	
	echo "Forma de pagamento: $formaPag<br>";
	echo "Parcelamento: $parcelamento<br>";
	echo "Juros da parcela: % $valorJuros<br>";
	
   	echo "<hr>";
	echo "1 - Conectando no MySql...<br>";
	
	$con = mysqli_connect("localhost", "root", "");
	
	echo "2 - Abrindo o banco supermercado...<br>";
	mysqli_select_db($con, "supermercado") or
		die("Erro na sele��o do banco." . mysqli_error($con));
		
	$comandoSQL = "insert into venda(
		codVenda, codCliente, codCaixa, codFuncionario, codEstoque, nomeTransport, dataVenda, 
		valorBruto, desconto, frete, valorFinal, formaPag, parcelamento, valorJuros, entregue)
		values (
		'$codVenda', '$codCliente', '$codCaixa', '$codFuncionario', '$codEstoque', '$nomeTransport','$dataVenda',
		'$valorBruto', '$desconto', '$frete', '$valorFinal', '$formaPag', '$parcelamento', '$valorJuros', '$entregue')";
		// Vari�veis num�ricas podem ser usadas sem aspas simples
		
	mysqli_query($con, $comandoSQL) or
		die("Erro na execu��o do comando de inser��o de registro MySQL: " . mysqli_error($con));
		
	echo "<br>Registro gravado com sucesso";

?>

