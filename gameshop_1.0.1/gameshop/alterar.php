<?php require_once 'ClassGame.php'; ?>
<?php require_once 'ClassGameDAO.php';?>
<?php

$id =$_GET['id']; 
$nome =$_GET['nome'];
$preco = $_GET['preco'];
$descricao = $_GET['descricao'];

?>
<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Alterar</title>
		<link rel="stylesheet" href="css/style.scss">
    </head>
	<body>
	  <center>
    <div class="container">
            <a href="index.php">
                <img class="" src="images/gameshop-logo.png" alt="" width="400px">
            </a>
            <br><br>
        </div>
    <div class="container" style="display:flex">
            <form action="AlterarProcessa.php" method="GET">
                <!-- ID: -->
                <input type="text" name="id" readonly="true" placeholder="ID" style="width: 59vw;" value=<?php echo $id;?>>
                <br>
                <br>
                <!-- Nome: -->
                <input type=text name=nome placeholder="Nome" style="width: 59vw;" value=<?php echo $nome;?>>
                <br>
                <br>
                <!-- Preço: -->
                <input type="text" name=preco placeholder="Preço" style="width: 59vw;" value=<?php echo $preco;?> >
                <br>
                <br>
                <!-- Descrição: -->
                <input type="text" name=descricao placeholder="Descrição" style="width: 59vw;" value=<?php echo $descricao;?> >
                <br>
                <br>
                <button type="submit" class="btn btn-danger" style="width: 59vw;">Alterar</button>		 
            </form>
       </div>
	  <center> 


      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>