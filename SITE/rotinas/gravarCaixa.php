<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/mystyle.css">
	</head>
	
	<body>
		<!-- Banner -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<center>
					<a href="index.html">
						<img 	src="../imagens/logo.png"
								title="&copy; Mercado Cid">
					</a>
				</center>
			</div>
		</div>

		<?php
			if (!isset($_POST["codigo"]))
				die("A rotina não foi chamada corretamente");
			
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con, "supermercado") or
			  die ("Erro na seleção do banco supermercado: ".mysqli_error($con));
			
			$codigo 		= $_POST["codigo"];
			$codVenda 		= $_POST["codVenda"];
			$codProduto 	= $_POST["codProduto"];
			$qtde 			= $_POST["qtde"];
			$precoUnidade 	= $_POST["precoUnidade"];
			$precoTot		= $precoUnidade * $qtde;
											
			$comandoSQL = "UPDATE caixa SET codVenda = '$codVenda',
								codProduto = '$codProduto', 
								qtde = '$qtde',
								precoUnidade = '$precoUnidade'
						WHERE codCaixa = '$codigo'";
	
			mysqli_query($con, $comandoSQL) or
			  die("Erro na atualização dos dados: ".mysqli_error($con));
			
			echo "Registro alterado com sucesso!<br>";			
		?>
		
		<a href="listagemCaixa.php">Voltar</a>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>