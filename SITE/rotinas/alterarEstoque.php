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
			
			$comando = "SELECT * FROM estoque WHERE codEstoque = $codigo";
			
			$registros = mysqli_query($con, $comando) or
			  die("Erro na seleção do registro $codigo".mysqli_error($con));
			
			$linhas = mysqli_num_rows($registros);
			
			if ($linhas < 1)
				die("Código não encontrado. Registro excluido");
			
			$dados = mysqli_fetch_array($registros);
			
			$codEstoque 		= $dados["codEstoque"];
			$codFornecedor 		= $dados["codFornecedor"];
			$codProduto 		= $dados["codProduto"];
			$nomeProduto 		= $dados["nomeProduto"];
			$codFuncionario		= $dados["codFuncionario"];
			$nomeFuncionario	= $dados["nomeFuncionario"];
			$categoria 			= $dados["categoria"];
			$precoUnidade 		= $dados["precoUnidade"];
			$codLote 			= $dados["codLote"];
			$dataRecebimento 	= $dados["dataRecebimento"];
			$dataFabricacao	 	= $dados["dataFabricacao"];
			$dataValidade 		= $dados["dataValidade"];
			$qtdeEstoque 		= $dados["qtdeEstoque"];
			$ativo 				= $dados["ativo"];				
			$obs 				= $dados["obs"];			
		?>
		
		<br><h2 id="paragrafo">Cadastro de Estoque - Alteração</h2><br>		
		<form 	action="gravarEstoque.php"
				method="post"
				enctype="multipart/form-data">
		
			<input 	type="hidden"
					name="codigo"
					value="<?php echo $codigo; ?>">
		
			<p id="paragrafo">Código do Estoque: <input	type="number"
														name="codEstoque"
														min="1"
														max="99"
														placeholder="00"
														value="<?php echo $codEstoque;?>"
														disabled>
														
			Código do Fornecedor: <input	type="number"
											name="codFornecedor"
											min="1"
											max="99999"
											placeholder="00000"
											value="<?php echo $codFornecedor;?>"><br><br></p>
															
			<p id="paragrafo">Código do Produto: <input	type="number"
														name="codProduto"
														min="1"
														max="99999"
														placeholder="00000"
														value="<?php echo $codProduto;?>">									
		
			Nome do Produto:   <input	type="text"
										name="nomeProduto"
										placeholder="Digite o nome do Produto"
										size="30"
										maxlength="100"
										value="<?php echo $nomeProduto;?>"><br><br></p>
														
			<p id="paragrafo">Código do Funcionário:   <input	type="number"
																name="codFuncionario"
																min="1"
																max="9999"
																placeholder="0000"
																value="<?php echo $codFuncionario;?>">
																
			Nome do Funcionário:   <input	type="text"
											name="nomeFuncionario"
											placeholder="Digite o nome do Funcionario"
											size="30"
											maxlength="100"
											value="<?php echo $nomeFuncionario;?>"><br><br></p>
											
			<p id="paragrafo">Categoria: 	<select	name="categoria">								
												<option value="alimentos" <?php if($categoria == "alimentos")echo "selected"; ?>>Alimentos</option>
												<option value="bebidas" <?php if($categoria == "bebidas")echo "selected"; ?>>Bebidas</option>
												<option value="higiene" <?php if($categoria == "higiene")echo "selected"; ?>>Higiene</option>
												<option value="limpeza" <?php if($categoria == "limpeza")echo "selected"; ?>>Limpeza</option>
											</select>
											
			Preço da Unidade:     <input 	type="number" 
											name="precoUnidade" 
											min="0" 
											max="9999.99" 
											placeholder="9999,99"
											step="0000.01"
											value="<?php echo $precoUnidade;?>"><br><br></p>
							
			<p id="paragrafo">Código do Lote:     <input	type="number"
															name="codLote"
															min="1"
															max="9999"
															placeholder="0000"
															value="<?php echo $codLote;?>">
															
			Data de Recebimento:   <input	type="date"
											name="dataRecebimento"
											value="<?php echo $dataRecebimento;?>"><br><br></p>
								
			<p id="paragrafo">Data de Fabricação:   <input	type="date"
															name="dataFabricacao"
															value="<?php echo $dataFabricacao;?>">
		
			Data de Validade:  <input	type="date"
										name="dataValidade"
										value="<?php echo $dataValidade;?>"><br><br></p>
									
			<p id="paragrafo">Quantidade no Estoque:  <input	type="number"
																name="qtdeEstoque"
																min="1"
																max="99999"
																placeholder="00000"
																value="<?php echo $qtdeEstoque;?>">
										
			Produto Ativo: <input	type="radio"
									name="ativo"
									value="1"
									<?php if ($ativo == "1")echo "checked"; ?>>  Sim
						
							<input	type="radio"
									name="ativo"
									value="0"
									<?php if ($ativo == "0")echo "checked"; ?>>  Não<br><br></p>
			
			<p id="paragrafo">Observações:<br>
					<p><textarea 	name="obs" 
									rows="3" 
									cols="80"
									placeholder="Digite aqui informações complementares"
									value="<?php echo $obs;?>"></textarea></p></p>

			<p id="paragrafo"><input type="submit" value="Enviar"></p>
			<br><br><br>
		</form>
			
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>