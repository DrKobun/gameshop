<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php'; ?>
<?php

   $classGameDAO = new ClassGameDAO();
   $array = $classGameDAO->listar();

	  if (isset($_GET['id'])) 
    {
		  $id = $_GET['id'];
      //$nome = $_GET['nome']; 
			
	    $novoGame = new ClassGame();
			$novoGame->setId($id);
		          
			$classGameDAO = new ClassGameDAO();
			
      $array = $classGameDAO->excluir($novoGame);
      if($array==TRUE) 
      {
        header('Location:listar.php');
      }else 
      {
        echo "Erro";
	  }
    }
?>