<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/mystyle.css">
	</head>
	
	<body>
		<!-- Banner -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<center>
					<a href="index.html">
						<img 	src="imagens/logo.png"
								title="&copy; Mercado Cid">
					</a>
				</center>
			</div>
		</div>
		
		<!-- Conteudo AQUI! -->
		<div>
			<?php
				$codEstoque 		= $_POST["codEstoque"];
				$codFornecedor 		= $_POST["codFornecedor"];
				$codProduto 		= $_POST["codProduto"];
				$nomeProduto 		= $_POST["nomeProduto"];
				$codFuncionario 	= $_POST["codFuncionario"];
				$nomeFuncionario 	= $_POST["nomeFuncionario"];
				$categoria 			= $_POST["categoria"];
				$precoUnidade 		= (float)$_POST["precoUnidade"];
				$codLote 			= $_POST["codLote"];
				$dataRecebimento 	= $_POST["dataRecebimento"];
				$dataFabricacao		= $_POST["dataFabricacao"];
				$dataValidade 		= $_POST["dataValidade"];
				$qtdeEstoque 		= (int)$_POST["qtdeEstoque"];
				$ativo 				= $_POST["ativo"];
				$obs				= $_POST["obs"];
	
	
				if (strlen($nomeProduto) <= 3)
					die("O nome do produto deve ter mais do que 3 caracteres.");
	
				if (strlen($nomeFuncionario) < 5)
					die("Informe o nome completo do funcionário");
	
				if ($precoUnidade <= 0.50)
					die("Preço deve ser maior do que R$ 0,10.");
				
				if (($ativo <> 0) and ($ativo <> 1))
					die("Não é possível identificar se o produto está ativo ou não.");	
				
				if ($codEstoque > 99)
					die("Código do Estoque deve conter apenas 2 dígitos");
				
				if ($codFornecedor > 99999)
					die("Código do Fornecedor deve conter apenas 5 dígitos");
				
				if ($codProduto > 99999)
					die("Código do Produto deve conter apenas 5 dígitos");
				
				if ($codFuncionario > 9999)
					die("Código do Funcionário deve conter apenas 4 dígitos");
				
				if ($codLote > 9999)
					die("Código do Lote deve conter apenas 4 dígitos");
				
				if ($qtdeEstoque > 99999)
					die("Valor inválido na Quantidade do Estoque (suporta até 99999 itens)");
				
				
				//Conexão com o banco
				$con = mysqli_connect("localhost", "root", "");
				
				mysqli_select_db($con, "supermercado") or
					die("Ocorreu um erro na conexão com o banco".mysqli_error($con));
				
				$insert = "INSERT INTO estoque (codEstoque, codProduto, nomeProduto, codFornecedor, 
				codFuncionario, nomeFuncionario, categoria, precoUnidade, codLote, dataRecebimento, 
				dataFabricacao, dataValidade, qtdeEstoque, ativo, obs) 
					VALUES ('$codEstoque', '$codProduto', '$nomeProduto', '$codFornecedor', '$codFuncionario', 
				'$nomeFuncionario', '$categoria', $precoUnidade, '$codLote', '$dataRecebimento', 
				'$dataFabricacao', '$dataValidade', $qtdeEstoque, $ativo, '$obs')";
				
				mysqli_query($con, $insert) or
					die("Erro ao inserir os registros na tabela: ".mysqli_error($con));
					
				echo "<br>Dados enviados com sucesso!";	
				echo "<br><a href='rotinas/listagemEstoque.php'>Ver listagem dos dados</a>";
				echo "<br><a href='cadEstoque.html'>Voltar</a>";
			?>			
			<br>
		</div>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>