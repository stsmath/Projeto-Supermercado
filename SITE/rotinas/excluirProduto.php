<?php
 $con=mysqli_connect('localhost', 'root', '') ;
 
   mysqli_select_db($con, 'supermercado') or 
    die("Erro na sele��o do banco:" . mysqli_error($con));
	
	  $codProduto = $_GET["c"];
  $comandoSQL=" DELETE FROM produto WHERE codProduto=$codProduto";
  mysqli_query($con, $comandoSQL) or 
    die("Erro na exclus�o do produtos: " . mysqli_error($con));
  
  echo "Produto $codProduto exclu�do com sucesso!<hr>";
  echo "<a href='listagemProduto.php'>Continuar</a>";

?>