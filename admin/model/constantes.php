<?php
require_once 'constantesBanco.php';

//função para remover expressões comuns de banco de dados
function seg($var) {
    $procura = array("insert into", "update", "delete from", "select % from");
    $retorno = str_ireplace($procura, '', $var);
//    $retorno = htmlentities($retorno);
    
    return $retorno;
}

//Constantes de Tabela
//Tabelas ADMIN
define("TBL_USUARIO",DB_ADMIN.TBL_ADMIN."usuarios ");
define("TBL_NOTICIA",DB_ADMIN.TBL_ADMIN."noticias ");
define("TBL_REGIAO", DB_ADMIN . TBL_ADMIN . "regiao ");
define("TBL_AGENDA", DB_ADMIN . TBL_ADMIN . "agenda ");
define("TBL_LOG", DB_ADMIN . TBL_ADMIN . "logs ");