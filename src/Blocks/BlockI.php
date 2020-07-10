<?php

namespace NFePHP\ECD\Blocks;

use NFePHP\ECD\Elements;
use NFePHP\ECD\Common\Block;
use NFePHP\ECD\Common\BlockInterface;

/**
 * Classe constutora do bloco I Lançamentos Contábeis
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados
 *
 * @method Elements\I001 i001(\stdClass $std) Constructor element I001
 * @method Elements\I010 i010(\stdClass $std) Constructor element I010
 * @method Elements\I012 i012(\stdClass $std) Constructor element I012
 * @method Elements\I015 i015(\stdClass $std) Constructor element I015
 * @method Elements\I020 i020(\stdClass $std) Constructor element I020
 * @method Elements\I030 i030(\stdClass $std) Constructor element I030
 * @method Elements\I050 i050(\stdClass $std) Constructor element I050
 * @method Elements\I051 i051(\stdClass $std) Constructor element I051
 * @method Elements\I052 i052(\stdClass $std) Constructor element I052
 * @method Elements\I053 i053(\stdClass $std) Constructor element I053
 * @method Elements\I075 i075(\stdClass $std) Constructor element I075
 * @method Elements\I100 i100(\stdClass $std) Constructor element I100
 * @method Elements\I150 i150(\stdClass $std) Constructor element I150
 * @method Elements\I151 i151(\stdClass $std) Constructor element I151
 * @method Elements\I155 i155(\stdClass $std) Constructor element I155
 * @method Elements\I157 i157(\stdClass $std) Constructor element I157
 * @method Elements\I200 i200(\stdClass $std) Constructor element I200
 * @method Elements\I250 i250(\stdClass $std) Constructor element I250
 * @method Elements\I300 i300(\stdClass $std) Constructor element I300
 * @method Elements\I310 i310(\stdClass $std) Constructor element I310
 * @method Elements\I350 i350(\stdClass $std) Constructor element I350
 * @method Elements\I355 i355(\stdClass $std) Constructor element I355
 * @method Elements\I500 i500(\stdClass $std) Constructor element I500
 * @method Elements\I510 i510(\stdClass $std) Constructor element I510
 * @method Elements\I550 i550(\stdClass $std) Constructor element I550
 * @method Elements\I555 i555(\stdClass $std) Constructor element I555
 */
final class BlockI extends Block implements BlockInterface
{
    const TOTAL = '0990';
    
    public $elements = [
        'i001' => ['class' => Elements\I001::class, 'level' => 1, 'type' => 'single'],
        'i010' => ['class' => Elements\I010::class, 'level' => 2, 'type' => 'single'],
        'i012' => ['class' => Elements\I012::class, 'level' => 3, 'type' => 'multiple'],
        'i015' => ['class' => Elements\I015::class, 'level' => 4, 'type' => 'multiple'],
        '1020' => ['class' => Elements\I020::class, 'level' => 3, 'type' => 'multiple'],
        'i030' => ['class' => Elements\I030::class, 'level' => 3, 'type' => 'multiple'],
        'i050' => ['class' => Elements\I050::class, 'level' => 3, 'type' => 'multiple'],
        'i051' => ['class' => Elements\I051::class, 'level' => 4, 'type' => 'multiple'],
        'i052' => ['class' => Elements\I052::class, 'level' => 4, 'type' => 'multiple'],
        'i053' => ['class' => Elements\I053::class, 'level' => 4, 'type' => 'multiple'],
        'i075' => ['class' => Elements\I075::class, 'level' => 3, 'type' => 'multiple'],
        'i100' => ['class' => Elements\I100::class, 'level' => 3, 'type' => 'multiple'],
        'i150' => ['class' => Elements\I150::class, 'level' => 3, 'type' => 'multiple'],
        'i151' => ['class' => Elements\I151::class, 'level' => 4, 'type' => 'multiple'],
        'i155' => ['class' => Elements\I155::class, 'level' => 4, 'type' => 'multiple'],
        'i157' => ['class' => Elements\I157::class, 'level' => 5, 'type' => 'multiple'],
        'i200' => ['class' => Elements\I200::class, 'level' => 3, 'type' => 'multiple'],
        'i250' => ['class' => Elements\I250::class, 'level' => 4, 'type' => 'multiple'],
        'i300' => ['class' => Elements\I300::class, 'level' => 3, 'type' => 'multiple'],
        'i310' => ['class' => Elements\I310::class, 'level' => 4, 'type' => 'multiple'],
        'i350' => ['class' => Elements\I350::class, 'level' => 3, 'type' => 'multiple'],
        'i355' => ['class' => Elements\I355::class, 'level' => 4, 'type' => 'multiple'],
        'i500' => ['class' => Elements\I500::class, 'level' => 3, 'type' => 'multiple'],
        'i510' => ['class' => Elements\I510::class, 'level' => 3, 'type' => 'multiple'],
        'i550' => ['class' => Elements\I550::class, 'level' => 3, 'type' => 'multiple'],
        'i555' => ['class' => Elements\I555::class, 'level' => 4, 'type' => 'multiple'],
    ];
    
    public function __construct()
    {
        parent::__construct(self::TOTAL);
    }
}
