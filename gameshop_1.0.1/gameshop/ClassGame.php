<!-- ClassGame.php -->
<?php
class ClassGame 
{
    private $id;
    private $nome;   
    private $preco;
    private $descricao;


    function getPreco()
    {
        return $this->preco;
    }

    function setPreco($preco)
    {
        $this->preco = $preco;
    }
	
    function getDescricao()
    {
        return $this->descricao;
    }

    function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    function getId() 
    {
        return $this->id;
    }
    function getNome() 
    {
        return $this->nome;
    }
    function setId($id) 
    {
        $this->id = $id;
    }
    function setNome($nome) 
    {
        $this->nome = $nome;
    }

       
}
