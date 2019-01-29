<?php 	// salvar como gravarPet.php

	if (! isset($_POST["codFornecedor"]) )
	  die("Rotina chamada de forma incorreta!");
  
	// Conectando MYSQL e abrindo banco  
    
		$con = mysqli_connect("localhost","root","");
	
		mysqli_select_db($con , "supermercado") or 
		die("Erro na seleção do banco supermercado: " . mysqli_error($con)) ;
	
        $codFornecedor =$_POST["codFornecedor"];
	    $nomeFornecedor =$_POST["nomeFornecedor"];
        $ativo =$_POST["ativo"];
        $cnpj =$_POST["cnpj"];
        $categoria =$_POST["categoria"];
        $endereco=$_POST["endereco"];
        $bairro =$_POST["bairro"];
        $numero =$_POST["numero"];
        $cidade =$_POST["cidade"];
        $uf =$_POST["uf"];
        $cep =$_POST["cep"];
        $ddd =$_POST["ddd"];
        $telefone =$_POST["telefone"];
        $telefone2 =$_POST["telefone2"];
        $telefone3 =$_POST["telefone3"];
        $email =$_POST["email"];
        $obs =$_POST["obs"];
	
$comandoSQL= "UPDATE fornecedor SET codFornecedor='$codFornecedor',
                    nomeFornecedor='$nomeFornecedor' ,
					ativo='$ativo' ,
					cnpj='$cnpj' ,
					categoria='$categoria' ,
					endereco='$endereco' ,
					bairro='$bairro' ,
                    numero='$numero' ,
					cidade='$cidade' ,
                    uf='$uf' ,
					cep='$cep' ,
                    ddd='$ddd' ,
                    telefone='$telefone' ,
                    telefone2='$telefone2' ,
                    telefone3='$telefone3' ,
                    email='$email' ,
					obs='$obs'";

	$comandoSQL = $comandoSQL . "WHERE codFornecedor='$codFornecedor'";
	
		
	mysqli_query($con, $comandoSQL) or 
		die("Erro na atualização de 
			dados :" . mysqli_error($con));
	echo "Registro alterado com sucesso!<br>";
	echo "<a href='listagemFornecedor.php'>Voltar</a><br><br>";
?>