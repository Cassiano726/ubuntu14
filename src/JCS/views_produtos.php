<?php

use JCS\Banco;
use JCS\Conexao;

$com = new Conexao();

$db = new Banco($com->getDB());

$db->listar();
