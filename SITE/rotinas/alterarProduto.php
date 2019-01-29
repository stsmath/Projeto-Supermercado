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
				<center><img src="../imagens/logo.png"></center>
			</div>
		</div>
		
		<div id="principal">
		<!-- Conteudo AQUI! -->
		<h2>Produto</h2>
		<?php 
		if (! isset($_GET["c"]))
		   die("Programa chamado de forma incorreta!");
		   
		   $codProduto = $_GET["c"];
		
		   $conn = mysqli_connect("localhost","root","");
	
		mysqli_select_db($conn , "supermercado") or 
		die("Erro na seleção do banco 
		produtos: " . mysqli_error($conn)) ;
		   
		   $comando="SELECT * FROM produto WHERE codProduto=$codProduto";
		   
		   $registro = mysqli_query($conn , $comando) or 
		    die("Error na selecao do registro $codProduto" . mysqli_error($conn));
			
			$linhas = mysqli_num_rows($registro);
			
			if ($linhas <1)
			    die("Codigo $codProduto nao encontrado. Registro foi excluido??" );
				
				$dados=mysqli_fetch_array($registro);
				$codProduto = $dados["codProduto"];
				$nome       = $dados["nome"];
				$fabricante = $dados["fabricante"];
                $codFabricante = $dados["codFabricante"];
                $custo         = $dados["custo"];
                $despesas      = $dados["despesas"];
                $lucro         = $dados["lucro"];
                $precoVenda    = $dados["precoVenda"];
                $promacao      = $dados["promocao"];
                $precoPromocio = $dados["precoPromocio"];
                $categoria     = $dados["categoria"];
                $peso          = $dados["peso"];
                $ativo         = $dados["ativo"];
                $descricao     = $dados["descricao"];  				
		
		?>
		
		<form action="gravarProduto.php"
		      enctype="multipart/form-data"
				method="post">
				
				<input type="hidden" name="codProduto" value="<?php echo $codProduto;?>">
				
					Nome: <input type="text" name="nome"
					       maxlength="30" size="30" 
			               placeholder="Informe o nome do produto">
			   <br>
			   Fabricante: <input type="text" name="fabricante"
					        maxlength="30" size="30" 
			                placeholder="Informe o nome do fabricante">
               <br>
			   Codigo do Frabricante: <input type="number" 
					                         name="codFabricante"
					                         min="1"
					                         max="9999999999">
			   <br>
			   
				<legend>Tabela de valores</legend>
			   Custo: 	<input 	type="number" 
					            name="custo" 
					            min="0" 
					            max="999.999" 
					            placeholder="999,999"
					            step="0.001"> 
								<br>
		
		       Despesas: <input type="number" 
					            name="despesas" 
					            min="0" 
					            max="999.999" 
					            placeholder="999,999"
					            step="0.001"> 
								<br>
			   Lucro:     <input type="number" 
					            name="lucro" 
					            min="0" 
					            max="999.999" 
					            placeholder="999,999"
					            step="0.001"> 
								<br>
								
								precoVenda: <input type="number" 
					                  name="precoVenda" 
					                  min="0" 
					                  max="999.999" 
					                  placeholder="999,999"
					                  step="0.001"> 
								<br>
            
			  <input 	type="checkbox" 
						    name="promocao" 
						    value="1">
				entra em promocao<br>	
			  
			   
			   precoPromocio: <input type="number" 
					                  name="precoPromocio" 
					                  min="0" 
					                  max="999.999" 
					                  placeholder="999,999"
					                  step="0.001"> 
								<br>
                								
			 		
					
					
				<legend>Descricoes</legend>
					
					Categoria:
						<select name="categoria">
	                            <option value="A">Alimentos</option>
				                <option value="L">Limpeza</option>
				                <option value="B">Bebidas</option>
				                <option value="I">Infantins</option>
				                <option value="H">Higiene</option>
				                <option value="O">Outros</option>
				</select>
				<br>
					
					Peso (Kg):  <input 	type="number" 
					                    name="peso" 
					                    min="0" 
					                    max="999.999" 
					                    placeholder="999,999"
					                    step="0.001"> 
										<br>
					
					<input 	type="checkbox" 
						    name="ativo" 
						    value="1">
				O produto esta Ativo<br>						 
					
					descricao:<br>
					             <textarea 	name="descricao" 
							                rows="3" 
							                cols="80"
						                    placeholder="Descricao de produto"></textarea>
											<br>
											
											
											<input type="submit" value="Enviar">
		</form>
		</div>
		<br>
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>