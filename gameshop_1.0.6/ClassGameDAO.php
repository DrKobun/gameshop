<?php
require_once 'Conexao.php';
class ClassGameDAO 
{
   		public function cadastrar($novoGame) 
        {
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO game(id,nome,preco,descricao,path) values (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $novoGame->getId());
            $stmt->bindValue(2, $novoGame->getNome());
            $stmt->bindValue(3, $novoGame->getPreco());
            $stmt->bindValue(4, $novoGame->getDescricao());
            $stmt->bindValue(5, $novoGame->getPath());
            $stmt->execute();
			
	        echo "<center><h1>Cadastro realizado com sucesso!</h1><center><br>";
            
?>
			<a href="listar.php">Listar</a>
            
		    <?php
		} 
            catch (PDOException $erro) 
            {
				echo $erro->getMessage();
			}
		}
		
        public static function buscarCod($id)
        {
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt =$pdo->prepare("SELECT * FROM jogo WHERE id_jogo = :id");
            $stmt->bindParam(':id', $id,PDO::PARAM_INT);
            $stmt->execute();
            $ok = $stmt->fetchAll();

            if(is_array($ok))
            {
                return $ok;
            }
            else
            {
                return false;
            }
    
        }
        public function listar() 
        {
            try 
            {
                $pdo = Conexao::getInstance();
                $sql = "SELECT id, nome, preco, descricao, path FROM game";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (PDOException $erro) 
            {
                return $erro->getMessage();
            }        
        }
	
        public function excluir($novoGame)
        {
            try 
            {
                $pdo = Conexao::getInstance();
                $sql = "DELETE FROM game WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id',$novoGame->getId());
                $stmt->execute();
                return TRUE;
            }catch (PDOException $erro) 
            {
                return $erro->getMessage();
            }
        }	

        public function alterar($novoGame) 
        {
            try 
            {
                $pdo = Conexao::getInstance(); 

                
                $sql = "UPDATE game SET id=:id, nome=:nome, preco=:preco, descricao=:descricao, path=:path WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id',$novoGame->getId());
                $stmt->bindValue(':nome',$novoGame->getNome());
                $stmt->bindValue(':preco',$novoGame->getPreco());
                $stmt->bindValue(':descricao',$novoGame->getDescricao());
                $stmt->bindValue(':path',$novoGame->getPath());
                $stmt->execute();
                return TRUE;
            } catch (PDOException $erro)
            {
                echo $erro->getMessage();
                return false;
            }
        }


    public function atualizarImagem(ClassGame $game) 
    {
        try 
        {
            $conexao = Conexao::getInstance();
            
            // Verifica se a imagem foi alterada
            if ($game->getPath())
            {
                $sql = "UPDATE game SET nome = :nome, preco = :preco, descricao = :descricao, path = :path WHERE id = :id";
            } else 
            {
                // Caso a imagem não tenha sido alterada, mantém o caminho existente
                $sql = "UPDATE game SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id";
            }

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $game->getId());
            $stmt->bindValue(':nome', $game->getNome());
            $stmt->bindValue(':preco', $game->getPreco());
            $stmt->bindValue(':descricao', $game->getDescricao());

            // Se a imagem foi alterada, vincula o novo caminho
            if ($game->getPath()) 
            {
                $stmt->bindValue(':path', $game->getPath());
            }

            $stmt->execute();

            return true;
        } catch (PDOException $erro) 
        {
            echo $erro->getMessage();
            return false;
        }
    }

    public function listarImagem($id) 
    {
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "SELECT path FROM game where id = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $erro) 
        {
            return $erro->getMessage();
        }        
	}
}
