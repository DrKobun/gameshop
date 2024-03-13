<html>
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Adiciona</title>
		<link rel="stylesheet" href="css/style.scss">
    </head>
    <body>

        <div class="container">
            <a href="index.php">
                <img class="" src="images/gameshop-logo.png" alt="" width="400px">
            </a>   
        </div>
        
        
        <div class="container" style="display: flex; justify-content: flex-end;">
            <br>
            <a href="listar.php">
                <img src="images/produtos-btn.png" alt="">
            </a>
            
        </div>
        <br>
        <div class="container">
            <h1>Incluir novo produto</h1>
        </div>

        <div class="container" style="display:flex">
            <form enctype="multipart/form-data" action="ControleGame.php" method="POST">
                <!-- ID: -->
                <input type=hidden name=id />
                <!-- Nome: -->
                <input type=text name=nome placeholder="Nome" style="width: 59vw;"/>
                <br>
                <br>
                <!-- Preço: -->
                <input type="text" name=preco placeholder="Preço" style="width: 59vw;">
                <br>
                <br>
                <!-- Descrição: -->
                <input type="text" name=descricao placeholder="Descrição" style="width: 59vw;">
                <br>
                <br>
                <input type="file" name=arquivo style="width: 59vw;">
                <br>
                <br>
                <button type="submit" class="btn btn-danger" style="width: 59vw;">Adicionar</button>
                	 
            </form>
       </div>



       <!-- <form enctype="multipart/form-data" action="imagem.php" method="POST">
       <input type="file" name=arquivo style="width: 59vw;">
                
                <button type="submit" class="btn btn-danger" style="width: 59vw;">Adicionar</button>		 
            </form>
       </div> -->
       
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>