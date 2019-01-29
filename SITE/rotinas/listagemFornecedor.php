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
		
		<h2>Listagem dos Fornecedores</h2>
    <?php	
    echo "<table>";
	$con=mysqli_connect("localhost", "root","") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($con , "supermercado") or
		die("Falha na seleção do banco de dados:" . mysqli_error($con) );
			
	$comando="SELECT * FROM fornecedor" ;
	
	$rs = mysqli_query($con , $comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($con) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Falha na recuperação dos registros:" . mysqli_error($con) );
			
    echo "Número de registros encontrados: $linhas  <hr> ";
    echo "</table>" ;
    $comandoSQL = "SELECT * FROM fornecedor";
    
    if ( $linhas <1 ) 
             die("Tabela <b>Fornecedores</b> está vazia! :( ");
    
    $contador=0;
	    echo "<table border='1'>";
        echo "  <tr>";
        echo "    <th>Código do Fornecedor</th>";
        echo "    <th>Nome do Fornecedor</th>";
        echo "    <th>Ativo</th>";
        echo "    <th>Cnpj</th>";
        echo "    <th>Categoria</th>";
        echo "    <th>Endereço</th>";
        echo "    <th>Bairro</th>";
        echo "    <th>Número</th>";
        echo "    <th>Cidade</th>";
        echo "    <th>Uf</th>";
        echo "    <th>Cep</th>";
        echo "    <th>Ddd</th>";
        echo "    <th>Telefone</th>";
        echo "    <th>Telefone2</th>";
        echo "    <th>Telefone3</th>";
        echo "    <th>Email</th>";
        echo "    <th>Observações</th>";
        echo "  </tr>";
        while ($contador < $linhas)
         {
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

                 echo "<tr>";
                 echo "  <td>$codFornecedor</td> ";
                 echo "  <td>$nomeFornecedor</td>";
                 echo "  <td>$ativo</td>";
                 echo "  <td>$cnpj</td>";
                 echo "  <td>$categoria</td>";
                 echo "  <td>$endereco</td>";
                 echo "  <td>$bairro</td>";
                 echo "  <td>$numero</td>";
                 echo "  <td>$cidade</td>";
                 echo "  <td>$uf</td>";
                 echo "  <td>$cep</td>";
                 echo "  <td>$ddd</td>";
                 echo "  <td>$telefone</td>";
                 echo "  <td>$telefone2</td>";
                 echo "  <td>$telefone3</td>";
                 echo "  <td>$email</td>";
                 echo "  <td>$obs</td>";
                 echo "  <td> <a href='alterarFornecedor.php?c=$codFornecedor'>Alterar Dados</a></td>";
                 echo "  <td> <a href='excluirFornecedor.php?c=$codFornecedor'>Excluir dados</a></td>";
                 echo "</tr>" ;
                 $contador++;
             }
			 echo "</table>";
			 echo "<br><a href='../cadFornecedor.html'>Voltar</a><br><br><br>";
?>
	</body>
</html>