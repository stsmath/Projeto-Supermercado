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
		
		<!-- Conteudo AQUI! -->
		<div>
			<?php				
				$con = mysqli_connect('localhost', 'root', '');
					
				mysqli_select_db($con, "supermercado") or
					die("Erro na seleção do banco".mysqli_error($con));
				
				$comandoSQL = "SELECT codCaixa, codVenda, codProduto, qtde, precoUnidade, precoTot
				FROM caixa";
				
				$registros = mysqli_query($con, $comandoSQL) or
					die("Erro na seleção de dados".mysqli_error($con));
				
				$linhas = mysqli_num_rows($registros);
				
				if ($linhas < 1)
					die("Tabela <b>CAIXA</b> esta vazia");				
							
				// Listar os dados
				$contador = 0;
				
				echo "<table border = '1'>";
				echo "	<tr>";
				echo "		<th>Código do Caixa</th>";
				echo "		<th>Código da Venda</th>";
				echo "		<th>Código do Produto</th>";
				echo "		<th>Quantidade</th>";
				echo "		<th>Preço da Unidade</th>";
				echo "		<th>Preço Total</th>";
				echo "		<th colspan=2>Ações</th>";
				echo "	</tr>";
								
				while ($contador < $linhas){
					$dados = mysqli_fetch_array ($registros); //recupera os dados de uma linha ($variavelRegistro)  -  cria matriz de 1 dimensao
					$codCaixa = $dados["codCaixa"];
					$codVenda = $dados["codVenda"];
					$codProduto = $dados["codProduto"];
					$qtde = $dados["qtde"];
					$precoUnidade = $dados["precoUnidade"];
					$precoTot = $dados["precoTot"];	
					
					echo "<tr>";
					echo "	<td>$codCaixa</td>";
					echo "	<td>$codVenda</td>";
					echo "	<td>$codProduto</td>";
					echo "	<td>$qtde</td>";
					echo "	<td>$precoUnidade</td>";
					echo "	<td>$precoTot</td>";
					echo "	<td><a href='excluirCaixa.php?cod=$codCaixa'>Excluir Dados</a></td>"; //php? a interrogacao indica que o metodo que será mandado é o metodo get
					echo "	<td><a href='alterarCaixa.php?cod=$codCaixa'>Alterar Dados</a></td>";
					echo "</tr>";
					
					$contador++;
				}
				echo "</table>";
				echo "<br><a href='../caixa.html'>Voltar</a>";
			?>
	
		</div>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>