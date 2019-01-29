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
				
				$comandoSQL = "SELECT codEstoque, codFornecedor, codProduto, nomeProduto, codFuncionario, 
				nomeFuncionario, categoria, precoUnidade, codLote, dataRecebimento, dataFabricacao, 
				dataValidade, qtdeEstoque, ativo, obs FROM estoque";
				
				$registros = mysqli_query($con, $comandoSQL) or
					die("Erro na seleção de dados".mysqli_error($con));
				
				$linhas = mysqli_num_rows($registros);
				
				if ($linhas < 1)
					die("Tabela <b>ESTOQUE</b> esta vazia");				
							
				// Listar os dados
				$contador = 0;
				
				echo "<table border = '1'>";
				echo "	<tr>";
				echo "		<th>Código do Estoque</th>";
				echo "		<th>Código do Fornecedor</th>";
				echo "		<th>Código do Produto</th>";
				echo "		<th>Nome do Produto</th>";
				echo "		<th>Código do Funcionário</th>";
				echo "		<th>Nome do Funcionário</th>";
				echo "		<th>Categoria</th>";
				echo "		<th>Preço da Unidade</th>";
				echo "		<th>Código do Lote</th>";
				echo "		<th>Data de Recebimento</th>";
				echo "		<th>Data de Fabricação</th>";
				echo "		<th>Data de Validade</th>";
				echo "		<th>Quantidade no Estoque</th>";
				echo "		<th>Ativo</th>";
				echo "		<th>Observações</th>";
				echo "		<th colspan=2>Ações</th>";
				echo "	</tr>";
				
				while ($contador < $linhas){
					$dados = mysqli_fetch_array ($registros); //recupera os dados de uma linha ($variavelRegistro)  -  cria matriz de 1 dimensao
					$codEstoque = $dados["codEstoque"];
					$codFornecedor = $dados["codFornecedor"];
					$codProduto = $dados["codProduto"];
					$nomeProduto = $dados["nomeProduto"];
					$codFuncionario = $dados["codFuncionario"];
					$nomeFuncionario = $dados["nomeFuncionario"];
					$categoria = $dados["categoria"];
					$precoUnidade = $dados["precoUnidade"];
					$codLote = $dados["codLote"];
					$dataRecebimento = $dados["dataRecebimento"];
					$dataFabricacao = $dados["dataFabricacao"];
					$dataValidade = $dados["dataValidade"];
					$qtdeEstoque = $dados["qtdeEstoque"];
					$ativo = $dados["ativo"];				
					$obs = $dados["obs"];
					
					echo "<tr>";
					echo "	<td>$codEstoque</td>";
					echo "	<td>$codFornecedor</td>";
					echo "	<td>$codProduto</td>";
					echo "	<td>$nomeProduto</td>";
					echo "	<td>$codFuncionario</td>";
					echo "	<td>$nomeFuncionario</td>";
					echo "	<td>$categoria</td>";
					echo "	<td>$precoUnidade</td>";
					echo "	<td>$codLote</td>";
					echo "	<td>$dataRecebimento</td>";
					echo "	<td>$dataFabricacao</td>";
					echo "	<td>$dataValidade</td>";
					echo "	<td>$qtdeEstoque</td>";
					echo "	<td>$ativo</td>";
					echo "	<td>$obs</td>";
					echo "	<td><a href='excluirEstoque.php?cod=$codEstoque'>Excluir Dados</a></td>"; //php? a interrogacao indica que o metodo que será mandado é o metodo get
					echo "	<td><a href='alterarEstoque.php?cod=$codEstoque'>Alterar Dados</a></td>" ;
					echo "</tr>";
					
					$contador++;
				}
				echo "</table>";
				echo "<br><a href='../cadEstoque.html'>Voltar</a>";
			?>
	
		</div>
		
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>