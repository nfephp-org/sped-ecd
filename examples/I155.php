<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

$std = new \stdClass();
$std->COD_CTA = 'teste';
$std->COD_CCUS = 'PROD';
$std->VL_SLD_INI = 200.22;
$std->IND_DC_INI = 'D';
$std->VL_DEB = 0;
$std->VL_CRED = 33.33;
$std->VL_SLD_FIN = 4.44;
$std->IND_DC_FIN = 'D';

try {
    $z7 = new \NFePHP\ECD\Elements\I155($std);
    echo "{$z7}".'<br>';
    echo '|I155|teste|PROD|200,22|D|0,00|33,33|4,44|D|';
} catch (\Exception $e) {
    echo $e->getMessage();
}


