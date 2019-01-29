<html>
	<head>
		<title>Mercado Cid</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/mystyle.css">
		<style>
			.listagem{
				width: 100%;
			}
			.listagem table{
				margin: 10px;
				text-align: center;
			}
		</style>
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
		<div class="listagem">
			<?php				
				$con = mysqli_connect('localhost', 'root', '');
					
				mysqli_select_db($con, "supermercado") or
					die("Erro na sele??o do banco".mysqli_error($con));
				
				$comandoSQL = "SELECT nomeFuncionario, dataNasc, cargo, ativo, cpf, 
				rg, sexo, estadoCivil, dataContratado, endereco, bairro, 
				cidade, uf, cep, ddd,foneCel,foneRes,email,obs FROM funcionario";
				
				$registros = mysqli_query($con, $comandoSQL) or
					die("Erro na sele??o de dados".mysqli_error($con));
				
				$linhas = mysqli_num_rows($registros);
				
				if ($linhas < 1)
					die("Tabela <b>FUNCIONARIO</b> esta vazia");				
							
				// Listar os dados
				$contador = 0;
				
				echo "<table border = '1'>";
				echo "	<tr>";
				echo "		<th>Nome do Funcionario</th>";
				echo "		<th>Data de Nascimento</th>";
				echo "		<th>Cargo</th>";
				echo "		<th>Ativo</th>";
				echo "		<th>CPF</th>";
				echo "		<th>RG</th>";
				echo "		<th>Sexo</th>";
				echo "		<th>Estado Civil</th>";
				echo "		<th>Data de Contratação</th>";
				echo "		<th>Endereço</th>";
				echo "		<th>Bairro</th>";
				echo "		<th>Cidade</th>";
				echo "		<th>UF</th>";
				echo "		<th>CEP</th>";
                echo "		<th>DDD</th>";
                echo "      <th>Celular</th>";
                echo "      <th>Residencial</th>";
                echo "      <th>Email</th>";
                echo "      <th>Observações</th>";
                echo "      <th colspan=2>Ação</th>";
				echo "	</tr>";
				
				while ($contador < $linhas){
					$dados = mysqli_fetch_array ($registros); //recupera os dados de uma linha ($variavelRegistro)  -  cria matriz de 1 dimensao
                    
                    $nomeFuncionario =  $dados["nomeFuncionario"];
                    $dataNasc =         $dados["dataNasc"];
                    $cargo =            $dados["cargo"];
                    $dataContratado =   $dados["dataContratado"];
                    $cpf =              $dados["cpf"];
                    $rg =               $dados["rg"];
                    $endereco =         $dados["endereco"];
                    $bairro =           $dados["bairro"];
                    $cidade =           $dados["cidade"];
                    $uf =               $dados["uf"];
                    $cep =              $dados["cep"];
                    $ddd =              $dados["ddd"];
                    $foneCel =          $dados["foneCel"];
                    $foneRes =          $dados["foneRes"];
                    $email =            $dados["email"];
                    $obs =              $dados["obs"];
                    $sexo =             $dados["sexo"];
                    $estadoCivil =      $dados["estadoCivil"];
                    $ativo =            $dados["ativo"];
                    
					
					echo "<tr>";
					echo "	<td>$nomeFuncionario</td>";
					echo "	<td>$dataNasc</td>";
					echo "	<td>$cargo</td>";
					echo "	<td>$ativo</td>";
					echo "	<td>$cpf</td>";
					echo "	<td>$rg</td>";
					echo "	<td>$sexo</td>";
					echo "	<td>$estadoCivil</td>";
					echo "	<td>$dataContratado</td>";
					echo "	<td>$endereco</td>";
					echo "	<td>$bairro</td>";
					echo "	<td>$cidade</td>";
					echo "	<td>$uf</td>";
					echo "	<td>$cep</td>";
					echo "	<td>$ddd</td>";
                    echo "	<td>$foneCel</td>";
                    echo "	<td>$foneRes</td>";
                    echo "	<td>$email</td>";
                    echo "	<td>$obs</td>";
					echo "	<td><a href='excluirFuncionario.php?cod=$cpf'>Excluir Dados</a></td>"; //php? a interrogacao indica que o metodo que ser? mandado ? o metodo get
					echo "</tr>";
					
					$contador++;
				}
				echo "</table>";
				echo "<br><a href='../cadFuncionario.html'>Voltar</a>";
			?>
	
		</div>
		
		<!-- Rodap? -->
		<div class="footer">
			<p>&copy; 2018 Mercadinho Cid Ltda.</p>
		</div>
		
	</body>
</html>