<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JCS;

/**
 * Description of Conexao
 *
 * @author jerem
 */
class Conexao {
    //put your code here
    private $db;
    public function __construct()
    {
        try {
            $this->db = new \PDO("mysql:host=localhost;dbname=pizzaria_italiana", "root", "root");
        } catch (PDOException $exc) {
            //echo $exc->getTraceAsString();
            echo "Não foi possivel realizar a conexão com o banco de dados!" .$exc->getMessage(), $exc->getCode(), $exc->getLine();
        }
    }
    public function getDB(){
        return $this->db;
    }
}
