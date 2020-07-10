<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use \stdClass;
use NFePHP\ECD\Blocks\Block0;
use NFePHP\ECD\ECD;

try {
    
    $efd = new ECD();
    
    //Construção do Bloco 0 - Bloco Inicial
    //IMPORTANTE: a ORDEM afeta o resultado portanto é muito importante 
    //carregar os elementos na ordem correta
    $b0 = new Block0();
    
    //0000 Obrigatório [1:1]
    //Abertura do Arquivo Digital e Identificação da entidade
    $std = new stdClass();
    $std->lecd = 'LECD';
    $std->dt_ini = '01012015';
    $std->dt_fin = '31122015';
    $std->nome = 'EMPRESA TESTE';
    $std->cnpj = '11111111000199';
    $std->uf = 'AM';
    $std->ie = null;
    $std->cod_mun = '3434401';
    $std->im = '99999';
    $std->ind_sit_esp = null;
    $std->ind_sit_ini_per = 0;
    $std->ind_nire = 1;
    $std->ind_fin_esc = 0;
    $std->cod_hash_sub = null;
    $std->ind_grande_porte = 0;
    $std->tip_ecd = 0;
    $std->cod_scp = null;
    $std->ident_mf = 'N';
    $std->ind_esc_cons = 'N';
    $std->ind_centralizada = 0;
    $std->ind_mudanc_pc = 0;
    $std->cod_plan_ref = 1;
    $b0->z0000($std);
    
    //0001 Obrigatório
    //Abertura do Bloco 0
    $std = new stdClass();
    $std->ind_dad = 1; 
    $b0->z0001($std);
   
   
    //adicionando o bloco 0 ao EFD
    $efd->add($b0);
    //recuperar os dados em tela
    echo str_replace("\n", "<br>", $efd->get()).'<br>';
} catch (\Exception $e) {
    echo $e->getMessage();
}
