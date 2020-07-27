<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use \stdClass;
use NFePHP\ECD\Elements\Z0007;

$std = new stdClass();
$std->COD_ENT_REF = 'ZZZ';
$std->COD_INSCR = 'Z1234567';

try {
    $z7 = new Z0007($std);
    echo "{$z7}".'<br>';
    echo '|0007|01|Z1234567|';
} catch (\Exception $e) {
    echo $e->getMessage();
}


