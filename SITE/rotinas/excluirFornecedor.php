<?php
  $con=mysqli_connect('localhost', 'root', '') ;
  mysqli_select_db($con, 'supermercado') or 
    die("Erro na sele��o do banco:" . mysqli_error($con));

  $codFornecedor = $_GET["c"];
  $comandoSQL=" DELETE FROM fornecedor WHERE codFornecedor=$codFornecedor"; mysqli_query($con, $comandoSQL) or 
    die("Erro na exclus�o do fornecedor: " . mysqli_error($con));
  
  echo "Fornecedor c�digo $codFornecedor exclu�do com sucesso!<hr>";
  echo "<a href='listagemFornecedor.php'>Voltar</a><br><br>";
?>