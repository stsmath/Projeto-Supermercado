<html>
	<head>
		<title>Mercado Cid</title>
	</head>
	<body>
		<h2>Listagem de Clientes</h2>
			<?php
					
					 $con = mysqli_connect('localhost','root','');
						
					 mysqli_select_db($con , "supermercado") or 
						die("Erro na seleção do banco " . mysqli_error($con) );
						  
					 
					 $comandoSQL = "SELECT * FROM cliente";
					   
					 $registros = mysqli_query($con , $comandoSQL) 
						or die("Erro na seleção de dados" . mysqli_error($con) );
					 
					 $linhas = mysqli_num_rows($registros);
					 
					 echo "Numero de registros encontrados: $linhas <br>";
					 
					 if ( $linhas <1 ) 
						 die("Tabela <b>clientes</b> está vazia! :( ");
					 
					 echo "<table border='1'>";
					 echo "	<tr>";
					 echo "		<th>Codigo</th>";
					 echo "		<th>Nome Cliente</th>";
					 echo "		<th>CPF</th>";
					 echo "		<th>RG</th>";
					 echo "		<th>Data de Nascimento</th>";
					 echo "		<th>Ativo</th>";
					 echo "		<th>Endereco</th>";
					 echo "		<th>Numero da Casa</th>";
					 echo "		<th>Bairro</th>";
					 echo "		<th>Cidade</th>";
					 echo "		<th>UF</th>";
					 echo "		<th>CEP</th>";
					 echo "		<th>DDD</th>";
					 echo "		<th>Tel Residencial</th>";
					 echo "		<th>Tel Celular</th>";
					 echo "		<th>Email</th>";
					 echo "		<th>OBS</th>";
					 echo "		<th colspan=1>Ações<</th>";
					 echo "	</tr>";
					 
					 $contador=0;
					
					 while ($contador < $linhas)
					 {
						 $dados = mysqli_fetch_array ($registros);
						 $codigo = $dados["codigo"];
						 $nomeCliente = $dados["nomeCliente"];
						 $cpf = $dados["cpf"];
						 $rg = $dados["rg"];
						 $dataNasc = $dados["dataNasc"];
						 $ativo = $dados["ativo"];
						 $endereco = $dados["endereco"];
						 $numCasa = $dados["numCasa"];
						 $bairro = $dados["bairro"];
						 $cidade = $dados["cidade"];
						 $uf = $dados["uf"];
						 $cep = $dados["cep"];
						 $ddd = $dados["ddd"];
						 $foneRes	 = $dados["foneRes"];
						 $foneCel	 = $dados["foneCel"];
						 $email	 = $dados["email"];
						 $obs	 = $dados["obs"];
						 
						 echo "	<tr>";
						 echo "		<td>$codigo</td>" ;
						 echo "		<td>$nomeCliente</td>" ;
						 echo "		<td>$cpf</td>" ;
						 echo "		<td>$rg</td>" ;
						 echo "		<td>$dataNasc</td>" ;
						 echo "		<td>$ativo</td>" ;
					     echo "		<td>$endereco</td>" ;
						 echo "		<td>$numCasa</td>" ;
						 echo "		<td>$bairro</td>" ;
						 echo "		<td>$cidade</td>" ;
						 echo "		<td>$uf</td>" ;
						 echo "		<td>$cep</td>" ;
						 echo "		<td>$ddd</td>" ;
						 echo "		<td>$foneRes</td>" ;
						 echo "		<td>$foneCel</td>" ;
						 echo "		<td>$email</td>" ;
						 echo "		<td>$obs</td>" ;
						 echo "		<td> <a href='excluirCliente.php?c=$codigo'>Excluir Dados</a> </td>" ;
						 echo "	</tr>";
						 
						 $contador++;
					 }
					 echo "</table>" ;
					 echo "<a href='../cadCliente.html'>Voltar</a>";
			?>
	</body>
</html>	