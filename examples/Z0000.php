<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use \stdClass;
use NFePHP\ECD\Elements\Z0000;

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

try {
    $b0 = new Z0000($std);
    echo "{$b0}".'<br>';
} catch (\Exception $e) {
    echo $e->getMessage();
}

echo '|0000|LECD|01012015|31122015|EMPRESA TESTE|11111111000199|AM||3434401|99999||0|1|0||0|0||N|N|0|0|1|<br>';
