
<?php 
     $nome			= $_POST["nome"];
	 $fabricante    = $_POST["fabricante"];
	 $codFabricante	= (int) $_POST["codFabricante"];
	 $custo         = (float) $_POST["custo"];
	 $despesas      = (float) $_POST["despesas"];
	 $lucro         = (float)$_POST["lucro"];
	 $precoVenda = $custo + $despesas + $lucro;
	 $promocao      = 0;
	 		if(isset($_POST["promocao"]))
			$promocao = (int) $_POST["promocao"];
     $precoPromocio	= (float)$_POST["precoPromocio"];
	 $categoria		= $_POST["categoria"];
	 $peso			= (float) $_POST["peso"];
	 $ativo= 0;
		if(isset($_POST["ativo"]))
			$ativo = (int) $_POST["ativo"];
	
	$descricao = $_POST["descricao"];
 
     if ( strlen($nome) <2 )
        die("Informe nome com no minimo 2 caracteres.");

	if ( strlen($fabricante) <2 )
		    die("Informe nome do fabricante com no minimo 2 caracteres.");
	 
	 
	if ( $categoria == "")
		die("Categoria deve ser informado");
	 
    if ($peso <= 0)
		die("Peso deve ser informado.");
	
	
	echo "<h2>Dados Recebidos</h2>";
	echo "Nome: <b>$nome</b> <br>";
	echo "Fabricante: $fabricante<br>";
	echo "Codigo do Fabricante: $codFabricante<br>";
	echo "Custo: $custo<br>";
	echo "Despesas: $despesas<br>";
	echo "Lucro: $lucro<br>";
	echo "Preco e Venda: $precoVenda<br>";
	echo "Promocao? $promocao<br>";
	echo "precoPromocio: $precoPromocio<br>";
	echo "Categoria: $categoria<br>";
	echo "Peso: $peso<br>";
	echo "Ativo: $ativo<br>";
	echo "$descricao<br>";
	
	echo "<hr>";
	echo "conectando no mysql...<br>";
	
	$conn = mysqli_connect("localhost", "root", "");
	
	mysqli_select_db($conn, "supermercado")or
	die("Erro na selecao do banco<br>" . mysqli_error($conn));
	
	$comandoSQL = "INSERT INTO produto(nome, fabricante, codFabricante, custo, despesas, lucro, precoVenda, promocao, precoPromocio, categoria, peso, ativo, descricao)
	
	VALUES (
	'$nome', '$fabricante','$codFabricante', '$custo', '$despesas', 
	'$lucro','$precoVenda', '$promocao', '$precoPromocio', '$categoria', 
	'$peso', '$ativo','$descricao');";
	
	echo $comandoSQL;
	
	mysqli_query( $conn, $comandoSQL) or
	die("Erro na excucao do comando INSERT do registro MYSQL:" . mysqli_error($conn));
	
	echo "<br>Dados enviados com sucesso!";	
	echo "<br><a href='rotinas/listagemProduto.php'>Ver listagem dos dados</a>";
	echo "<br><a href='cadProduto.html'>Voltar</a>";	
?>
