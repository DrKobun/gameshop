<?php
require_once 'conexao.php';
class ClassGameDAO 
{
   		public function cadastrar($novoGame) 
        {
        try {
            $pdo = Conexao::getInstance(); // Instanciando o objeto a partir da classe conexão -solicitar um “getInstance()” na nossa classe Conexao
            $sql = "INSERT INTO game(id,nome, preco, descricao) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoGame->getId());
            $stmt->bindValue(2, $novoGame->getNome());
            $stmt->bindValue(3, $novoGame->getPreco());
            $stmt->bindValue(4, $novoGame->getDescricao());
            $stmt->execute();
			//Os “binds” são as operações de atribuição de valores aos nossos parâmetros, ou seja, o parâmetro “:nome” terá o valor armazenado em “$Game-&gt;getNome()” e assim por diante. Utilizando o método “bindValue()” do PDO garantimos uma série de segurança extra para nosso código, tais como prevenção a SQL Injection.
           //return true;
	        echo "<center><h1>Cadastro realizado com sucesso!</h1><center><br>";
			?>
			<a href="listar.php">Listar</a>
		    <?php
			} catch (PDOException $erro) {
				echo $erro->getMessage();
			}
		}
		

    public function listar() 
    {
        try 
        {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, preco, descricao FROM game";
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
        }catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }	

    public function alterar($novoGame) {
        try {
            $pdo = Conexao::getInstance(); 
            $sql = "UPDATE game SET  id=:id, nome=:nome, preco=:preco, descricao=:descricao WHERE id=:id";
            $stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id',$novoGame->getId());
			$stmt->bindValue(':nome'     ,$novoGame->getNome());
            $stmt->bindValue(':preco'     ,$novoGame->getPreco());
            $stmt->bindValue(':descricao'     ,$novoGame->getDescricao());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }
}