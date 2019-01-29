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
				$codCaixa 		= $_POST["codCaixa"];
				$codVenda 		= $_POST["codVenda"];
				$codProduto 	= $_POST["codProduto"];
				$qtde 			= $_POST["qtde"];
				$precoUnidade 	= $_POST["precoUnidade"];
				$precoTot		= $precoUnidade * $qtde;
	
	
				if ($codCaixa > 99999)
					die("C�digo do Caixa deve conter 5 d�gitos");
				
				if ($codVenda > 99999)
					die("C�digo da Venda deve conter 5 d�gitos");
				
				if ($codProduto > 99999)
					die("C�digo do Produto deve conter apenas 5 d�gitos");
				
				if (($qtde < 0) and ($qtde > 100))
					die("Quantidade deve ser no m�nimo 1 e no m�ximo 100");
				
				if ($precoUnidade < 0.10)
					die("Pre�o da Unidade deve ser maior do que R$ 0,10");
				
				
				//Conex�o com o banco
				$con = mysqli_connect("localhost", "root", "");
				
				mysqli_select_db($con, "supermercado") or
					die("Ocorreu um erro na conex�o com o banco".mysqli_error($con));
				
				$insert = "INSERT INTO caixa (codCaixa, codVenda, codProduto, qtde, precoUnidade, precoTot) 
					VALUES ('$codCaixa', '$codVenda', '$codProduto', $qtde, $precoUnidade, $precoTot)";
				
				mysqli_query($con, $insert) or
					die("Erro ao inserir os registros na tabela: ".mysqli_error($con));
					
				echo "<h1>Dados enviados com sucesso!</h1>";
				echo "<h2>Pre�o Total da compra: R$ $precoTot</h2>";	
				echo "<br><a href='rotinas/listagemCaixa.php'>Ver listagem dos dados</a>";
				echo "<br><a href='caixa.html'>Voltar</a>";
			?>
			
		</div>
		
		<!-- Rodap� -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>