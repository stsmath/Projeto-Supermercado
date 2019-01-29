<?php 

if (! isset($_POST["codProduto"]) )
	  die("Rotina chamada de forma incorreta!");
  
  $conn = mysqli_connect("localhost","root","");
	
	mysqli_select_db($conn , "supermercado") or 
	die("Erro na seleção do banco 
	produtos: " . mysqli_error($conn)) ;
  
  $codProduto  = $_POST["codProduto"];
  $nome  = $_POST["nome"];
  $fabricante  = $_POST["fabricante"];
  $codFabricante  = $_POST["codFabricante"];
  $custo  = $_POST["custo"];
  $despesas   = $_POST["despesas"];
  $lucro   = $_POST["lucro"];
  $precoVenda  = $_POST["precoVenda"];
  $promocao   = $_POST["promocao"];
  $precoPromocio  = $_POST["precoPromocio"];
  $categoria    = $_POST["categoria"];
  $peso     = $_POST["peso"];
  $ativo  = $_POST["ativo"];
  $descricao = $_POST["descricao"];
  
  $comando="UPDATE produto SET nome='$nome',
                                            fabricante='$fabricante',
											codFabricante='$codFabricante',
											custo='$custo',
											despesas='$despesas',
											lucro='$lucro',
											precoVenda='$precoVenda',
											promocao='$promocao',
											precoPromocio='$precoPromocio',
											categoria='$categoria',
											peso='$peso',
											ativo='$ativo',
											descricao='$descricao'";
											
											$comando = $comando . "WHERE codProduto='$codProduto'";
											
mysqli_query($conn, $comando) or 
		die("Erro na atualização de 
			dados :" . mysqli_error($conn));
	echo "Registro alterado com sucesso!<br>";

?>
<a href="listagemProduto.php">Voltar</a>