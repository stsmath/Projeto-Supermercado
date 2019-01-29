<?php
  $con=mysqli_connect('localhost', 'root', '') ;
  mysqli_select_db($con, 'supermercado') or 
    die("Erro na seleção do banco:" . mysqli_error($con));

  $codFornecedor = $_GET["c"];
  $comandoSQL=" DELETE FROM fornecedor WHERE codFornecedor=$codFornecedor"; mysqli_query($con, $comandoSQL) or 
    die("Erro na exclusão do fornecedor: " . mysqli_error($con));
  
  echo "Fornecedor código $codFornecedor excluído com sucesso!<hr>";
  echo "<a href='listagemFornecedor.php'>Voltar</a><br><br>";
?>