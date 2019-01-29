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
		<?php 
         $conn=mysqli_connect("localhost","root","");
			
		 // 2 - Abrir/Selecionar o banco
		 mysqli_select_db($conn , "supermercado") or 
			die("Erro na seleção 
			   do banco " . mysqli_error($conn) );
			   
		 // 3 - Criar a variável com o comando SQL
		$comandoSQL = "SELECT codProduto, nome, fabricante, codFabricante, custo, despesas, lucro, precoVenda, promocao, precoPromocio, categoria, peso, ativo, descricao FROM produto"; 
		   
		 $registros = mysqli_query($conn , $comandoSQL) 
			or die("Erro na seleção de 
				dados" . mysqli_error($conn) );
		 
		 // 4 - Pega o número de registros/linhas
		 $linhas = mysqli_num_rows($registros);
		 
		 // Se não tem nenhum registro, parar
		 if ( $linhas <1 ) 
			 die("Tabela <b>entradaprodutos</b> está vazia! :( ");
		 
		 // Listar os dados
		 $contador=0;
		
		echo "<table border='1'>";
	    echo "	<tr>";
		echo "<th>Codigo</th>";
	echo "<th>Nome</th>";
	echo "<th>Fabricante</th>";
	echo "<th>Codigo do Fabricante</th>";
	echo "<th>Custo</th>";
	echo "<th>Despesas</th>";
	echo "<th>Lucro</th>";
	echo "<th>Preco e Venda</th>";
	echo "<th>Promocao?</th>";
	echo "<th>Preco Promocional</th>";
	echo "<th>Categoria</th>";
	echo "<th>Peso</th>";
	echo "<th>Ativo</th>";
	echo "<th>descricao</th>";
	echo "<th>Exclusao</th>";
	echo "<th>Alteracao</th>";
	echo "</tr>";
		while($contador < $linhas)
	{
		$dados = mysqli_fetch_array ($registros);
		$codProduto = $dados["codProduto"];
		$nome   = $dados["nome"];
		$fabricante   = $dados["fabricante"];
		$codFabricante   = $dados["codFabricante"];
		$custo   = $dados["custo"];
		$despesas   = $dados["despesas"];
		$lucro   = $dados["lucro"];
		$precoVenda   = $dados["precoVenda"];
		$promocao   = $dados["promocao"];
		$precoPromocio   = $dados["precoPromocio"];
		$categoria   = $dados["categoria"];
		$peso   = $dados["peso"];
		$ativo   = $dados["ativo"];
		$descricao = $dados["descricao"];
		
		echo "<tr>";
		echo "<td>$codProduto</td>";
		echo "<td>$nome</td> ";
	echo "<td>$fabricante</td>";
	echo "<td>$codFabricante</td>";
	echo "<td>$custo</td>";
    echo "<td>$despesas</td>";
	echo "<td>$lucro</td>";
	echo "<td>$precoVenda</td>";
	echo "<td>$promocao</td>";
	echo "<td>$precoPromocio</td>";
	echo "<td>$categoria</td>";
	echo "<td>$peso</td>";
	echo "<td>$ativo</td>";
	echo "<td>$descricao</td>";
				 echo "  <td> 
			 <a href='excluirProduto.php?c=$codProduto'>Excluir dados</a> 
					</td>";
					echo "		<td> <a href='alterarProduto.php?c=$codProduto'>Alterar Dados</a> </td>";
	
				 echo "</tr>" ;
				 $contador++;
	}
		echo "</table>" ;
		echo "<br><a href='../cadProduto.html'>Voltar</a>";
		
?>
		</div>
		<br>
		<br>
		<!-- Rodapé -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>