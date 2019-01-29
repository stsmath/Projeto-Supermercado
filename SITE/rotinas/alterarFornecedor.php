	<?php 

		$con = mysqli_connect("localhost","root","");
	
		mysqli_select_db($con , "supermercado") or 
		die("Erro na seleção do banco supermercado: " . mysqli_error($con)) ;
	
        $codFornecedor = $_GET["c"];
        
        $comandoSQL=" SELECT * FROM fornecedor WHERE codFornecedor=$codFornecedor"; mysqli_query($con, $comandoSQL) or 
            die("Erro na seleção do fornecedor: " . mysqli_error($con));
            
        $rs = mysqli_query($con , $comandoSQL) or 
			die("Erro na seleção do registro $codFornecedor" . mysqli_error($con));
        
			$linhas = mysqli_num_rows($rs);
			
			if ($linhas <1)
			  die("Código $codFornecedor não encontrado. Registro foi excluído??" );
			
        $con = mysqli_fetch_array ($rs);
        $codFornecedor = (int)$con["codFornecedor"];
        $nomeFornecedor = $con["nomeFornecedor"];
        $ativo = $con["ativo"];
        $cnpj = $con["cnpj"];
        $categoria = $con["categoria"];
        $endereco= $con["endereco"];
		$bairro = $con["bairro"];
		$numero = $con["numero"];
        $cidade = $con["cidade"];
        $uf = $con["uf"];
        $cep = $con["cep"];
        $ddd = $con["ddd"];
        $telefone = $con["telefone"];
        $telefone2 = $con["telefone2"];
        $telefone3 = $con["telefone3"];
        $email = $con["email"];
        $obs = $con["obs"];

?>
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
		
		<!-- Menu -->
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link" href="index.html">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="caixa.html">Caixa</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadCliente.html">Cliente</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cadEstoque.html">Estoque</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cadFornecedor.html">Fornecedores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cadFuncionario.html">Funcionários</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadProduto.html">Produto</a>
			</li>			
			<li class="nav-item">
				<a class="nav-link" href="cadVenda.html">Vendas</a>
			</li>
		</ul>
		
		<!-- Conteudo AQUI! -->
		<center><h2>Cadastro de Fornecedores</h2></center>
        <form action="gravarFornecedor.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="codFornecedor" value="<?php echo $codFornecedor;?>">
            <br>
			Nome da Empresa: <input type="text" name="nomeFornecedor" maxlength="30" size="30" 
			placeholder="Informe o nome da Empresa" value="<?php echo $nomeFornecedor;?>">
			
			Ativo: <input type="checkbox" name="ativo" value="1" <?php if ($ativo==1) echo "checked"; ?>><br><br>
			
			CNPJ: <input type="number" name="cnpj" max="999999999999" min="0" value="<?php echo $cnpj; ?>">
			
			Categoria: <input type="text" name ="categoria" maxlength="30" size="20" placeholder="Ex: Alimento" value="<?php echo $categoria;?>"><br><br>
			
			DDD: <input type="number" name="ddd" max="99" min="0" maxlength="2" value="<?php echo $ddd; ?>">
			
			Telefone 1: <input type="number" name="telefone" value="<?php echo $telefone; ?>">
			
			Telefone 2: <input type="number" name="telefone2" value="<?php echo $telefone2; ?>">
			
			Telefone 3: <input type="number" name="telefone3" value="<?php echo $telefone3; ?>"><br><br>
			
			Email: <input type="text" name="email" maxlength="40" size="40" placeholder="Digite seu Email" value="<?php echo $email;?>"> <br><br>
			
			CEP: <input type="number" name="cep" max="99999999" size="15" placeholder="99999999" value="<?php echo $cep; ?>"> <br><br>
            
			Cidade <input type="text" name="cidade" maxlength="25" size="20" placeholder="Informe a cidade" value="<?php echo $cidade;?>"> <br><br>
            
			UF: <select name="uf" id="">
				<option value="AC" <?php if ($uf == "AC") echo "selected"; ?>>AC</option>
				<option value="AL"<?php if ($uf == "AL") echo "selected"; ?>>AL</option>
				<option value="AP"<?php if ($uf == "AP") echo "selected"; ?>>AP</option>
				<option value="AM"<?php if ($uf == "AM") echo "selected"; ?>>AM</option>
				<option value="BA"<?php if ($uf == "BA") echo "selected"; ?>>BA</option>
				<option value="CE"<?php if ($uf == "CE") echo "selected"; ?>>CE</option>
				<option value="DF"<?php if ($uf == "DF") echo "selected"; ?>>DF</option>
				<option value="ES"<?php if ($uf == "ES") echo "selected"; ?>>ES</option>
				<option value="GO"<?php if ($uf == "GO") echo "selected"; ?>>GO</option>
				<option value="MA"<?php if ($uf == "MA") echo "selected"; ?>>MA</option>
				<option value="MT"<?php if ($uf == "MT") echo "selected"; ?>>MT</option>
				<option value="MS"<?php if ($uf == "MS") echo "selected"; ?>>MS</option>
				<option value="MG"<?php if ($uf == "MG") echo "selected"; ?>>MG</option>
				<option value="PA"<?php if ($uf == "PA") echo "selected"; ?>>PA</option>
				<option value="PB"<?php if ($uf == "PB") echo "selected"; ?>>PB</option>
				<option value="PR"<?php if ($uf == "PR") echo "selected"; ?>>PR</option>
				<option value="PE"<?php if ($uf == "PE") echo "selected"; ?>>PE</option>
				<option value="PI"<?php if ($uf == "PI") echo "selected"; ?>>PI</option>
				<option value="RJ"<?php if ($uf == "RJ") echo "selected"; ?>>RJ</option>
				<option value="RN"<?php if ($uf == "RN") echo "selected"; ?>>RN</option>
				<option value="RS"<?php if ($uf == "RS") echo "selected"; ?>>RS</option>
				<option value="RO"<?php if ($uf == "RO") echo "selected"; ?>>RO</option>
				<option value="RR"<?php if ($uf == "RR") echo "selected"; ?>>RR</option>
				<option value="SC"<?php if ($uf == "SC") echo "selected"; ?>>SC</option>
				<option value="SP"<?php if ($uf == "SP") echo "selected"; ?>>SP</option>
				<option value="SE"<?php if ($uf == "SE") echo "selected"; ?>>SE</option>
				<option value="TO"<?php if ($uf == "TO") echo "selected"; ?>>TO</option>
			</select>
            Rua: <input type="text" name="endereco" maxlength="50" size="40" placeholder="ex: Avenida Moçoro" value="<?php echo $endereco;?>"> <br><br>

            Bairro: <input type="text" name="bairro" maxlength="50" size="35" placeholder="ex: Limoeiro" value="<?php echo $bairro;?>"> <br><br>

            Numero: <input type="number" name="numero" max="9999" size="10" placeholder="ex:298" value="<?php echo $numero;?>"> <br><br>

            Observacoes: <br> <textarea name="obs" cols="40" rows="5"><?php echo $obs;?></textarea>   
			
            <input type="submit" value="Enviar">
		</form>
		
		<a href='rotinas/listagemFornecedor.php'>Ver listagem de dados</a><br><br><br>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>