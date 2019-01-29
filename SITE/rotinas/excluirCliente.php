<?php
 
  $con=mysqli_connect('localhost', 'root', '') ;
  
  mysqli_select_db($con, 'supermercado') or 
    die("Erro na seleção do banco:" . mysqli_error($con));

  $codigo = $_GET["c"];
  $comandoSQL=" DELETE FROM cliente WHERE codigo=$codigo";
  
  mysqli_query($con, $comandoSQL) or 
    die("Erro na exclusão do Cliente: " . mysqli_error($con));
  
  echo "Cliente código $codigo excluído com sucesso!<hr>";
  echo "<a href='listagemCliente.php'>Continuar</a>";
?>