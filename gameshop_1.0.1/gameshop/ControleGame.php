<?php
require_once 'ClassGame.php';
require_once 'ClassGameDAO.php';

	$id = $_POST['id'];
	$nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $novoGame = new ClassGame();
    $novoGame->setId($id);
	$novoGame->setNome($nome);
    $novoGame->setPreco($preco);
    $novoGame->setDescricao($descricao);
   
    $classGameDAO = new ClassGameDAO();
    $classGameDAO->cadastrar($novoGame);
    
    header('location:listar.php');
 ?>

