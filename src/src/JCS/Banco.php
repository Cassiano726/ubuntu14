<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JCS;

/**
 * Description of Banco
 *
 * @author jerem
 */
class Banco {
        //put your code here
    
    private $db;
    
    
    public function __construct(\PDO $db) {
        
        $this->db = $db;
                
    }
    
    
    /*TODO* Listar Por Nome*/
    public function listarPN($nome) {
        
        $query = "select * from produtos where nome='$nome'";
        $stmt = $this->db->query($query);
               
        $stmt->bindValue('nome',$nome, \PDO::PARAM_STR);
        
        $stmt->execute();
                
        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            
            $auxid = $resultado['id'];
            $auxnome = $resultado['nome'];
            $auxdescricao = $resultado['descricao'];
            
            echo'   <table>'
            . '<tr><td>Nome  :' . $auxid. '</td></tr>'
                    . '<tr><td>Nome  :' . $auxnome. '</td></tr>'
                    . '<tr><td>Nome  :' . $auxdescricao. '</td></tr>'
            . '</table>';
           
        }
    }
    
    
    /*Lista de teste para o tratar pegando o valor da lista*/
    public function listar() {
        
        $query = "select * from produtos";
        $stmt = $this->db->query($query);
        $stmt->execute();
        
        while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $id = $resultado['id'];
            $nome = $resultado['nome'];
            $descricao = $resultado['descricao'];
            $criado_em = $resultado['criado_em'];
            $atuazado_em = $resultado['atualizado_em'];
            
            
            
            echo '<form method=post action=index.php?page=editar_produto>'
            . '<table>.'
            . '<tr></br><td>Identificador::'.$id.'</td><td><input type=hidden value='.$id.' name=Id ><input type=hidden value='.$nome .' name=Nome><input type=hidden  value='.$descricao .' name=Descricao><button type=submit>Editar</button></td></tr>'
            . '<tr></br><td>Nome::'.$nome.'</td><td><a href=index.php?page=excluir>Excluir</a></td></tr>'
            . '<tr></br><td>Descrição::'.$descricao.'</td><td><a href=index.php?page=#></a></td></tr>'
            . '<tr></br><td>Criado em::'.$criado_em.'</td><td><a href=index.php?page=#></a></td></tr>'
            . '<tr></br><td>Atualizado em::'.$atuazado_em.'</td><td><a href=index.php?page=#></a></td></tr>'
            . '</table>'
            . '</form>';
           
        }
        
    }
    /*Termina aqui o teste de lista e pegando o valor.*/
    
    public function inserir($id, $nome, $descricao, $criado_em, $atualizado_em){
        
        
        $query = "insert into produtos(id, nome, descricao, criado_em, atualizado_em) values(:id , :nome, :descricao, :criado_em, :atualizado_em)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id",$id, \PDO::FETCH_NUM);
        $stmt->bindValue(":nome",$nome, \PDO::PARAM_STR);
        $stmt->bindValue(":descricao",$descricao, \PDO::PARAM_STR);
        $stmt->bindValue(":criado_em",$criado_em, \PDO::PARAM_STR);
        $stmt->bindValue(":atualizado_em",$atualizado_em, \PDO::PARAM_STR);
        
        $stmt->execute();
        
    }
    
    public function editar($id, $nome, $descricao,$criado_em,$atualizado_em) {

        if ($id != null) {
            
            
            $query = "update produtos set  nome=:nome , descricao=:descricao , criado_em=:criado_em, atualizado_em=:atualizado_em where id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
            $stmt->bindValue(":nome", $nome, \PDO::PARAM_STR);
            $stmt->bindValue(":descricao", $descricao, \PDO::PARAM_STR);
            $stmt->bindValue(":criado_em", $criado_em,  \PDO::PARAM_STR);
            $stmt->bindValue(":atualizado_em", $atualizado_em,  \PDO::PARAM_STR);
            $stmt->execute();
            
             
                      
        }
    }
    
    
    
    public function deletar($id,$nome) {
        
        $query = "delete  from produtos where id='$id' ";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue("id", $id, \PDO::PARAM_INT);
        $stmt->bindValue("nome", $nome, \PDO::PARAM_STR);
        
        $stmt->execute();
        //header("Location:index.php?page=views_produtos");
        
    }
}   


