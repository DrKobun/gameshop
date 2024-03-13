<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php'; ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Jogos cadastrados</title>
		<link rel="stylesheet" href="css/style.scss">
</head>
<body>
    <div class="container">
        <a href="index.php">
            <img class="" src="images/gameshop-logo.png" alt="">
        </a>
    </div>
    <br>
    <br>
    <br>
    <div class="container" style="display: flex;">
        <h1>&nbsp;&ensp;Produtos Cadastrados</h1>
        <br>
        <a class="" href="adiciona.php" style="margin-left:auto">
            <img src="images/adicionar-btn.png" alt="">
        </a>
    </div>
    <br><br><br><br>

    
    <!-- espaço para imagem -->
    <!-- <img src="images/lol.webp" height="200" width="150" alt=""> -->
    
    <div class="container"> 
        <!-- Nome do jogo -->
        
        <?php 
         $ClassGameDAO = new ClassGameDAO();
         $array= $ClassGameDAO->listar();

         foreach ($array as $array) 
         {
            ?>
            <div class="container" style="display: flex; margin-left:auto;"> 
                <!-- espaço para imagem -->
                <img src="images/lol.webp" height="200" width="150" alt=""> 
            <?php
            echo "<h1>". $array['nome']. "</h1>";
            echo "<p style='font-weight: bold;'>&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;".$array['preco']."</p>";
            ?>
                  
                  <div style="margin-left:auto ">
                    <form action="alterar.php" method="GET" style="margin-right:10px;">
                    <input type=hidden name=id value=<?php echo $array['id'];?> >
                    <input type=hidden name=nome value=<?php echo $array['nome'];?> >
                    <input type=hidden name=preco value=<?php echo $array['preco'];?> >
                    <input type=hidden name=descricao value=<?php echo $array['descricao'];?> >
                        <button style="margin-left:auto;">
                            <img src='images\editar-btn.png'>
                        </button>
                    </form> 	
                    <form action="excluir.php" method="GET">
                    <input type=hidden name=id value= <?php echo $array['id'];?> >
                        <button style="margin-left:auto;">
                            <img src='images/excluir-btn.png'>
                        </button>
                    </form>
                    </div>
                </div>
                
    <?php 
         }
                ?>  
       </div> 
    
        <!-- <h1>&nbsp;&ensp;League of Legends</h1> -->
        
        <!-- Preço -->
        <!-- <p style="font-weight: bold;">&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;R$99,99</p> -->
   
    <!-- Links à direita -->
    <!-- <div style="margin-left: auto;">
            <div style="display:flex; ">
                <form action="alterar.php" method="GET" style="margin-right:10px;">
                <input type=hidden name=id value=<?php// echo $array['id'];?> >
                <input type=hidden name=nome value=<?php //echo $array['nome'];?> >
                <input type=hidden name=preco value=<?php //echo $array['preco'];?> >
                <input type=hidden name=descricao value=<?php //echo $array['descricao'];?> >
                    <button>
                        <img src='images\editar-btn.png'>
                    </button>
                </form> 	
                <form action="excluir.php" method="GET">
                  <input type=hidden name=id value= <?php //echo $array['id'];?> >
                      <button>
                         <img src='images/excluir-btn.png'>
                      </button>
                </form>
            </div>
        </div>
</div> -->





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

<!-- <?php
    // $ClassGameDAO = new ClassGameDAO();
    // $array= $ClassGameDAO->listar();

    // foreach ($array as $array) 
	// {
		// echo "<td>". $array['id'] . "</td>";
        // echo "<td>". $array['nome'] . "</td>";	   
		// echo "<td>". $array['preco'] . "</td>";	   
		// echo "<td><a href='" . $array['descricao'] . "' target='_blank'>" . $array['descricao'] . "</a></td>";	   
		// echo "<td> ";
       ?>
			<form action="excluir.php" method="GET">
				<input type=hidden name=id value= <?php //echo $array['id'];?> >
				<button>
					<img src='imagem/x-button.png' width="30px" height="30px">
				</button>
			</form> 	
        <?php	
		//echo "</td> ";
		//echo  "<td> "; 
	                    ?>
           <form action="alterar.php" method="GET">
				 <input type=hidden name=id value=<?php //echo $array['id'];?> >
				 <input type=hidden name=nome      value=<?php //echo $array['nome'];?> >
				 <input type=hidden name=preco     value=<?php //echo $array['preco'];?> >
				 <input type=hidden name=descricao      value=<?php //echo $array['descricao'];?> >
				 <button>
				    <img src='imagem\Pencil.png' width="30px" height="30px">
				 </button>
		   </form> 		  
        <?php	      
   // }
?> -->