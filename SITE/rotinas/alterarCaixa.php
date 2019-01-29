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
			if (!isset($_GET["cod"]))
				die("Programa não foi chamado corretamente");
			
			$codigo = $_GET["cod"];
						
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con, "supermercado") or
			  die ("Erro na seleção do banco supermercado: ".mysqli_error($con));
			
			$comando = "SELECT * FROM caixa WHERE codCaixa = $codigo";
			
			$registros = mysqli_query($con, $comando) or
			  die("Erro na seleção do registro $codigo".mysqli_error($con));
			
			$linhas = mysqli_num_rows($registros);
			
			if ($linhas < 1)
				die("Código não encontrado. Registro excluido");
			
			$dados = mysqli_fetch_array($registros);
			
			$codCaixa 		= $dados["codCaixa"];
			$codVenda 		= $dados["codVenda"];
			$codProduto 	= $dados["codProduto"];
			$qtde 			= $dados["qtde"];
			$precoUnidade 	= $dados["precoUnidade"];			
		?>
		
		<br><h2 id="paragrafo">Registros do Caixa - Alteração</h2><br>	
		<form 	action="gravarCaixa.php"
				method="post"
				enctype="multipart/form-data">
				
			<input 	type="hidden"
					name="codigo"
					value="<?php echo $codigo; ?>">
		
			<p id="paragrafo">Código do Caixa: <input	type="number"
														name="codCaixa"
														min="1"
														max="99999"
														placeholder="00000"
														value="<?php echo $codCaixa;?>"
														disabled><br><br></p>
											
			<p id="paragrafo">Código da Venda:   <input	type="number"
														name="codVenda"
														min="1"
														max="99999"
														placeholder="00000"
														value="<?php echo $codVenda;?>"><br><br></p>											
							
			<p id="paragrafo">Código do Produto:     <input	type="number"
															name="codProduto"
															min="1"
															max="99999"
															placeholder="00000"
															value="<?php echo $codProduto;?>"><br><br></p>
															
			<p id="paragrafo">Quantidade:  <input	type="number"
													name="qtde"
													min="1"
													max="100"
													value="<?php echo $qtde;?>"><br><br></p>

			<p id="paragrafo">Preço Unidade: R$<input 	type="number" 
														name="precoUnidade" 
														min="0" 
														max="9999.99" 
														placeholder="9999,99"
														step="0000.01"
														value="<?php echo $precoUnidade;?>"><br></p>

			<p id="paragrafo"><input type="submit" value="Enviar"></p>
			<br><br><br>
		</form>
			
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>