<?php
    $nomeFornecedor =$_POST["nomeFornecedor"];
    $ativo =0;
    if(isset($_POST["ativo"])   )
        $ativo = (int) $_POST["ativo"];
    $cnpj =$_POST["cnpj"];
    $categoria =$_POST["categoria"];
    $endereco =$_POST["endereco"];
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

    //Validando os Dados
    if ( strlen($nomeFornecedor) <2 )
        die("Informe nome com no minimo 2 caracteres.");

    if ( $categoria == "")
    die("Categoria deve ser informada");

    if (  ($ativo <> 0) and ($ativo <> 1)  )
        die("Ativo informado incorretamente.");
        
        echo "<h3>Os dados foram recebidos com sucesso.</h3>";


    // Conectando o MySQL
    echo "<hr>";
	echo "1-Conectando no MYSQL (localhost)...<br>";
    echo "2-Abrindo o banco ....<br>";
    $con = mysqli_connect('localhost','root','');
    $use = mysqli_select_db($con, 'supermercado') or die('Erro no MYSQL: ' . mysql_error($con ));
    echo "OK - Banco aberto. <br>"	;

    $inserirValues = "INSERT INTO fornecedor(
    nomeFornecedor ,
    ativo ,
    cnpj ,
    categoria ,
    endereco ,
    bairro ,
    numero ,
    cidade ,
    uf ,
    cep ,
    ddd ,
    telefone ,
    telefone2 ,
    telefone3 ,
    email ,
    obs
    )
    VALUES ('$nomeFornecedor', '$ativo', '$cnpj', '$categoria', '$endereco', '$bairro', '$numero', '$cidade', '$uf', '$cep', 
    '$ddd', '$telefone', '$telefone2', '$telefone3', '$email', '$obs')";
    mysqli_query($con,$inserirValues) or die("Erro na inserção de dados". mysqli_error($con));
    
	echo "Cadastro do Fornecedor <b>$nomeFornecedor</b> finalizado!<br>";
    echo "<br><a href='rotinas/listagemFornecedor.php'>Ver listagem de dados</a>";
	echo "<br><a href='cadFornecedor.html'>Voltar</a>";
    ?>