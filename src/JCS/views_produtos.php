<?php

use JCS\Banco;
use JCS\Conexao;

$conexao = new Conexao();

$db = new Banco($conexao->getDB());

$db->listar();
