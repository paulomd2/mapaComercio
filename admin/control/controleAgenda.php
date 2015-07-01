<?php
require_once '../model/agendaDao.php';

$opcao = $_POST['opcao'];
switch($opcao){
        default:
        header('Location = ../');
        break;
        
        case 'cadRegiao':
            $data = $_POST['data'];
            $cidade = $_POST['cidade'];
            $local = $_POST['local'];
            $presidente = $_POST['presidente'];
            $regiao = $_POST['regiao'];
            $status = $_POST['status'];
            $dataCadastro = date('Y-m-d H:i:s');
            
            $objAgenda->setData($data);
            $objAgenda->setCidade($cidade);
            $objAgenda->setLocal($local);
            $objAgenda->setPresidente($presidente);
            $objAgenda->setIdRegiao($regiao);
            $objAgenda->setStatus($status);
            $objAgenda->setDataCadastro($dataCadastro);
            
            $objAgendaDao->cadAgenda($objAgenda);
            break;
        
        case 'altRegiao':
            $data = $_POST['data'];
            $cidade = $_POST['cidade'];
            $local = $_POST['local'];
            $presidente = $_POST['presidente'];
            $regiao = $_POST['regiao'];
            $status = $_POST['status'];
            $idAgenda = $_POST['idAgenda'];
            
            $objAgenda->setData($data);
            $objAgenda->setCidade($cidade);
            $objAgenda->setLocal($local);
            $objAgenda->setPresidente($presidente);
            $objAgenda->setIdRegiao($regiao);
            $objAgenda->setStatus($status);
            $objAgenda->setIdAgenda($idAgenda);
            
            $objAgendaDao->altAgenda($objAgenda);
            break;
        
        
        case 'delAgenda':
            $idAgenda = $_POST['idAgenda'];
            
            $objAgenda->setIdAgenda($idAgenda);
            
            $objAgendaDao->delAgenda($objAgenda);
            break;
}