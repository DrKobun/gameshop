<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php'; ?>
<?php 
	
	if(!isset($_SESSION))
	{
		$ok = @session_start();
		if($ok)
		{
		session_regenerate_id(true); 
		}
	}
	include('protect.php');
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Gameshop</title>
		<link rel="stylesheet" href="css/style.scss">

  </head>
  <body>

	<section>
		<div class="col-8 offset-4">
			<img class="" src="images/gameshop-logo.png" alt="">
		</div>
		<br>
		<div class="container">
			<div class="col-2">
				<a href="carrinho.php">
					<img src="images/botao-de-compra.png" alt="">
				</a>
				<p>
					<a href="logout.php">Encerrar sessão</a>
				</p>
			</div>
		</div>
	</section>
	<section id="header">
		<div class="container">
        <h1>BEM VINDO <?php $nome = $_SESSION['nome']; echo $nome; ?></h1>
			<div class="col-12 mt-5">
					<p> <a href="">Principal</a>  >  <a href="">Produtos</a> > <a href="">Games</a></p>         
			</div>
	</div>
    
	<?php 
         $ClassGameDAO = new ClassGameDAO();
         $array = $ClassGameDAO->listar();

         foreach ($array as $item) 
         {
			?>
	<section>
		<div class="container">
			<!-- <form action="Produto.php" method="GET">
			<input type="hidden" name="id" readonly="true" value=<?php //$item['id']?>> -->
			
			<a class="home-produto-item col-4 float-left px-2" href="Produto.php?id=<?php echo $item['id']; ?>">
				<div class="thumbnail" style="background-image: url('<?php echo $item['path']?>');"></div>
				<h2><?php echo $item['nome'];?></h2>
				<b><p>R$<?php echo $item['preco'];?></p></b>
				<!-- <button type="submit" class="detalhes-btn"> -->
					<div class="detalhes-btn"> 
						Ver detalhes 
					</div> 
				<!-- </button> -->
			</a>
			<!-- </form> -->
		</div>
		<?php
		 }
		?>
	</section>
		
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  	</body>
</html>

<!-- <div class="container">
			
			<a class="home-produto-item col-4 float-left px-2" href="leagueoflegends.php">
			<div class="thumbnail" style="background-image: url('images/lol.webp');"></div>
				<h2>League of Legends</h2>
				<p>R$99,99</p>
				<div class="detalhes-btn"> Ver detalhes </div>
			</a>

			<a class="home-produto-item col-4 float-left px-2" href="callofduty.php">
			<div class="thumbnail" style="background-image: url('images/callofduty.jpg');"></div>
				<h2>Call of Duty: Modern</h2>
				<p>R$399,99</p>
				<div class="detalhes-btn"> Ver detalhes </div>
			</a>

			<a class="home-produto-item col-4 float-left px-2" href="worldwarz.php">
			<div class="thumbnail" style="background-image: url('images/worldwarz.webp');"></div>
				<h2>World War: Z</h2>
				<p>R$159,99</p>
				<div class="detalhes-btn"> Ver detalhes </div>	
			</a>	 -->