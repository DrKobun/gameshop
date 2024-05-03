<?php 
require_once 'ClassGame.php';
require_once 'ClassGameDAO.php'; 
if(!isset($_SESSION))
	{
		$ok = @session_start();
		if($ok)
		{
		session_regenerate_id(true); 
		}
	}
	
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Gameshop</title>
		<link rel="stylesheet" href="css/style.scss">
		<style>
		body
        {
            font-family: Arial, Helvetica, sans-serif;
            background: -webkit-gradient(linear, left top, right top, from(cyan), to(lightgreen)) ;
        }
        .comprar-btn
        {
            background-image: url('images/comprar-btn.png');
            background-repeat: no-repeat;
            background-size: contain; /* Ajuste o tamanho da imagem conforme necessário */
            background-position: center; /* Centralize a imagem */
            border: none; /* Remova a borda padrão do botão */
            padding: 0; /* Remova o preenchimento interno do botão */
            width: 100px; /* Ajuste a largura do botão conforme necessário */
            height: 50px; /* Ajuste a altura do botão conforme necessário */
            text-indent: -9999px; /* Oculte o texto do botão, mantendo-o acessível para leitores de tela */
        }
		</style>
  </head>
  <body>
  <?php
        
        $idProduto = $_GET['id'];
        echo "ID DO PRODUTO: " . $idProduto . "<br>";
        $idUsuario = $_SESSION['id'];
        echo "ID DO USUÁRIO: " . $idUsuario;
        $ClassGameDAO = new ClassGameDAO();
        $array = $ClassGameDAO->mostrarJogoEspecifico($idProduto);
        $nome = $array['nome'];
        $preco = $array['preco'];
        $path = $array['path'];
        $descricao = $array['descricao'];
       
    ?>
	<section>
    <div class="container">
			<div class="col-4 offset-4">
				<img class="" src="images/gameshop-logo.png" alt="">
			</div>
    </div>
	</section>
	<section id="header">
        <div class="container">
            <div class="col-12 mt-5 ">
                <p> <a href="index.php">Principal</a>  >  <a href="">Produtos</a> > <a href="">Games</a> > <a href=""> <?php echo $nome?></a></p>         
            </div>
        </div>
    </section>
   
    <section>
        <div class="container">
			<a class="home-produto-item col-4 float-left px-2" href="">
				<div class="thumbnail" style="background-image:url('<?php echo $path;?>')">
				</div>	
            </a>

            <form action="produtoProcessa.php" method="POST">
 
                <input type="hidden" name="idProduto" value="<?php echo $idProduto;?>">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario;?>">
                <!-- <input type="hidden" name="precoProduto" value="<?php //echo $precoProduto; ?>"> -->

                <button type="submit" name="comprar" style="background: transparent; border: none; padding: 0;">
                <a class="home-produto-item col-8 float-left px-2" href="">
                   
                    <div>
                    </div>
                    <h2 class="mt-4"><?php echo $nome;?></h2>
                    <h2 style="font-weight: bold;"><?php echo $preco;?></h2>
                    <br><br><br><br><br><br><br><br>
                         <!-- <button type="submit" name="comprar" class="comprar-btn"> -->
                            <!-- <img src="images/comprar-btn.png" alt=""> -->
                         <!-- </button> -->
                            <img src="images/comprar-btn.png" alt="Comprar">
                        </a>
                </button>
            </form>

            <br>
			<h1 class="col-4">Detalhes</h1>
                <p class="col-8">
                    <?php echo $descricao;?>
				</p>
		</div>
	</section> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  	</body>
	</html>