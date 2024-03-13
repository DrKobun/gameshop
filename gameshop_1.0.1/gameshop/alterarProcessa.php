<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php';?>
<?php
 
			$id = $_GET['id']; 
			$nome = $_GET['nome'];
            $preco = $_GET['preco'];
            $descricao = $_GET['descricao'];
			
			$novoGame = new ClassGame();
			$novoGame->setId($id);
			$novoGame->setNome($nome);
            $novoGame->setPreco($preco);
            $novoGame->setDescricao($descricao);
			 		
            $classGameDAO = new ClassGameDAO();
            $array = $classGameDAO->alterar($novoGame);

            if($array==TRUE) 
            {
               header('Location:listar.php');
            }else 
            {
               echo "Erro";
			}
 ?>
	