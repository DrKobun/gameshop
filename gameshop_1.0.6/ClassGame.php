<?php
class ClassGame 
{
    private $id;
    private $nome;   
    private $preco;
    private $descricao;
    private $path;


    function getPath()
    {
        return $this->path;
    }

    function setPath($path)
    {
        $this->path = $path;
    }

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
