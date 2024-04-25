<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Jogos cadastrados</title>
		<link rel="stylesheet" href="css/style.scss">
        <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background: -webkit-gradient(linear, left top, right top, from(cyan), to(lightgreen)) ;
        }
        </style>
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
    
    <div class="container"> 
        <!-- Nome do jogo -->
        <?php 
         $ClassGameDAO = new ClassGameDAO();
         $array = $ClassGameDAO->listar();

         foreach ($array as $item) 
         {
        ?>
            <div class="container" style="display: flex; margin-left:auto;"> 
                <!-- espaço para imagem -->
                
               <img height="200" src="<?php echo $item['path']?>" alt="">            
<?php
            
    echo "<h1>". $item['nome']. "</h1>";
    echo "<p style='font-weight: bold;'>&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;".$item['preco']."</p>";
    echo "<br><br> <div style='align-items: flex-end;'><p>".$item['descricao']."</p> </div>";
?>
                  
                  <div style="margin-left:auto ">
                    <form action="alterar.php" method="POST" style="margin-right:10px;">
                    <input type=hidden name=id value=<?php echo $item['id'];?> >
                    <input type=hidden name=nome value=<?php echo $item['nome'];?> >
                    <input type=hidden name=preco value=<?php echo $item['preco'];?> >
                    <input type=hidden name=descricao value=<?php echo $item['descricao'];?> >
                    <input type=hidden name=arquivo value=<?php echo $item['path'];?> >
                        <button style="margin-left:auto;">
                            <img src='images\editar-btn.png'>
                        </button>
                    </form> 
                    <form action="excluir.php" method="GET">
                    <input type=hidden name=id value= <?php echo $item['id'];?> >
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>