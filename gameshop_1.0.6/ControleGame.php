<?php
require_once 'ClassGame.php';
require_once 'ClassGameDAO.php';


	$id = $_POST['id'];
	$nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo'];

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    $novoGame = new ClassGame();
    $novoGame->setId($id);
	$novoGame->setNome($nome);
    $novoGame->setPreco($preco);
    $novoGame->setDescricao($descricao);
    $novoGame->setPath($path);
   
    $classGameDAO = new ClassGameDAO();
    $classGameDAO->cadastrar($novoGame);

    header('location:listar.php');
 ?>