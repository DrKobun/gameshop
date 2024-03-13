<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php';?>
<?php
 
    
	$id = $_POST['id']; 
	$nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['novaImagem'];  
    $mesmaImagem = $_POST['mesmaImagem'];

    echo "<br>";
    print_r($mesmaImagem);
    print_r($arquivo);

  
    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

	// if ($arquivo['size'] > 0)
    // {
    //     $ext = strtolower(substr($arquivo['name'], -4)); //Pegando extensão do arquivo
    //     $new_name = $resultado['foto']; //Definindo um novo nome para o arquivo
    //     $dir = 'arquivos/'; //Diretório para uploads
    //     move_uploaded_file($arquivo['tmp_name'], $dir . $new_name);
    // }


    if(isset($arquivo))
    {
        $imagem = $arquivo;
    } else
    {
        $imagem = $mesmaImagem;
    }

    //$arquivo = $new_name;
    $novoGame = new ClassGame();
    $novoGame->setId($id);
    $novoGame->setNome($nome);
    $novoGame->setPreco($preco);
    $novoGame->setDescricao($descricao);
    $novoGame->setPath($path);

    $classGameDAO = new ClassGameDAO();
    $array = $classGameDAO->alterar($novoGame);
    //$array = $classGameDAO->atualizarImagem($novoGame);   
    
    if($array)
    {
        header('Location:listar.php');
    }
    else
    {
        echo "não foi possível carregar";
    }

 ?>
	