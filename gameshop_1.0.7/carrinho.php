<?php
    require_once 'ClassGame.php';
    require_once 'ClassGameDAO.php';
    //include('Conexao.php');
    include('protect.php');

    if(!isset($_SESSION))
	{
		$ok = @session_start();
		if($ok)
		{
            session_regenerate_id(true);
            // não está pegando
            
        }
	}
    
    
    
    // $idProduto = $_POST["idProduto"];
    $idUsuario = $_SESSION['id'];

    $ClassGameDAO = new ClassGameDAO();

    //$adicionaCarrinho = $ClassGameDAO->adicionarCarrinho($idProduto, $idUsuario);
               
    
    $tipoConta = $ClassGameDAO->tipoContaUsuario($idUsuario);
    //echo "ID DO PRODUTO: " . $idProduto . "<br>";
    echo "ID DO USUÁRIO: " . $idUsuario;
    echo "<br>TIPO CONTA: ".$tipoConta;
?>


<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Gameshop Carrinho</title>
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
 
	<section>
    <div class="container">
			<div class="col-4 offset-4">
                <a  <?php if ($tipoConta == 0) { ?> href="indexComprador.php" <?php } else { ?> href="index.php" <?php } ?>>
                    <img class="" src="images/gameshop-logo.png" alt="">
                </a>
			</div>
    </div>
	</section>
	<section id="header">
        <div class="container">
            <div class="col-12 mt-5 ">
                <p> <a href="index.php">Principal</a>  >  <a href="">Produtos</a> > <a href="">Games</a> > <a href=""></a></p>         
            </div>
        </div>
    </section>

    <section>
        <div class="container">
        
        <b><h1>Carrinho de <?php $nome = $_SESSION['nome']; echo $nome; echo " ID USUARIO:" . $idUsuario; ?></h1>
			<?php
                
                
                try 
                {
                    $pdo = Conexao::getInstance();
                    
                    $sql = "SELECT IdJogo FROM carrinho WHERE IdUsuario_FK = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $idUsuario);
                    $stmt->execute();
                    $idsJogos = $stmt->fetchAll(PDO::FETCH_COLUMN);
                
                    // Consulta SQL para recuperar os dados completos dos jogos da tabela "game"
                    $sql_jogos = "SELECT * FROM game WHERE id IN (" . implode(',', $idsJogos) . ")";
                    $stmt_jogos = $pdo->query($sql_jogos);
                    $jogos = $stmt_jogos->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($jogos as $jogo)
                    {
                        echo "<div>";
                    ?>
                        <img src="<?php echo $jogo['path'];?>" alt="" style="border-radius:15px; width:300px;">
                        <?php  echo "ID PRODUTO: " . $jogo['id'];?>
                        

                        <?php
                        echo "<h3>{$jogo['nome']}</h3>";
                        echo "<p>Preço: R$ {$jogo['preco']}</p>";
                        

                    ?> 
                        <form action="excluirCarrinho.php" method="GET">

                            <input type="hidden" name="id" value="<?php echo $idUsuario?>">
                            <input type="hidden" name="idJogo" value="<?php echo $jogo['id']?>">

                                <button>
                                    <img src='images/excluir-btn.png'>

                                </button>
                        </form>
                    <?php
                        echo "</div>";
                        
                    }

                    try 
                    {
                        $pdo = Conexao::getInstance();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        // Obter o ID do usuário da sessão
                        $idUsuario = $_SESSION['id'];
                    
                        $sql = "SELECT SUM(g.preco) AS total_preco FROM carrinho c
                                INNER JOIN game g ON c.idJogo = g.id
                                WHERE c.idUsuario_FK = ?";
                        

                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(1, $idUsuario);
                        $stmt->execute();
                        
                        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                        if ($resultado !== false && $resultado['total_preco'] !== null) 
                        {
                            $totalPreco = $resultado['total_preco'];
                            
                        } else 
                        {
                            echo "Nenhum resultado encontrado para o usuário $idUsuario.";
                        }
                    } catch (PDOException $e) 
                    {
                        echo "Erro ao calcular o total de compras para o usuário: " . $e->getMessage();
                    }  
                    
                    ?> 
                    <h1>TOTAL: <?php echo $totalPreco?> </h1>
                    <?php 
                } 
                catch (PDOException $erro) 
                {
                    //$erro->getMessage();
                    echo "Você ainda não tem nenhum produto no carrinho! volte à tela inicial e adicione produtos ao seu carrinho! "; 
                }
             ?>
		</div>
	</section> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  	</body>
	</html>