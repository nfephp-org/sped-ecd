<?php

namespace NFePHP\ECD\Blocks;

use NFePHP\ECD\Elements;
use NFePHP\ECD\Common\Block;
use NFePHP\ECD\Common\BlockInterface;

/**
 * Classe constutora do bloco J Demonstrações Contábeis
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados
 *
 * @method Elements\J001 j001(\stdClass $std) Constructor element J001
 * @method Elements\J005 j005(\stdClass $std) Constructor element J005
 * @method Elements\J100 j100(\stdClass $std) Constructor element J100
 * @method Elements\J150 j150(\stdClass $std) Constructor element J150
 * @method Elements\J210 j210(\stdClass $std) Constructor element J210
 * @method Elements\J215 j215(\stdClass $std) Constructor element J215
 * @method Elements\J800 j800(\stdClass $std) Constructor element J800
 * @method Elements\J801 j801(\stdClass $std) Constructor element J801
 * @method Elements\J900 j900(\stdClass $std) Constructor element J900
 * @method Elements\J930 j930(\stdClass $std) Constructor element J930
 * @method Elements\J932 j932(\stdClass $std) Constructor element J932
 * @method Elements\J935 j935(\stdClass $std) Constructor element J935
 */
final class BlockJ extends Block implements BlockInterface
{
    const TOTAL = '0990';
    
    public $elements = [
        'j001' => ['class' => Elements\J001::class, 'level' => 1, 'type' => 'single'],
        'j005' => ['class' => Elements\J005::class, 'level' => 2, 'type' => 'multiple'],
        'j100' => ['class' => Elements\J100::class, 'level' => 3, 'type' => 'multiple'],
        'j150' => ['class' => Elements\J150::class, 'level' => 3, 'type' => 'multiple'],
        'j210' => ['class' => Elements\J210::class, 'level' => 3, 'type' => 'multiple'],
        'j215' => ['class' => Elements\J215::class, 'level' => 4, 'type' => 'multiple'],
        'j800' => ['class' => Elements\J800::class, 'level' => 3, 'type' => 'multiple'],
        'j801' => ['class' => Elements\J801::class, 'level' => 3, 'type' => 'single'],
        'j900' => ['class' => Elements\J900::class, 'level' => 2, 'type' => 'single'],
        'j930' => ['class' => Elements\J930::class, 'level' => 3, 'type' => 'multiple'],
        'j932' => ['class' => Elements\J932::class, 'level' => 3, 'type' => 'multiple'],
        'j935' => ['class' => Elements\J935::class, 'level' => 3, 'type' => 'multiple'],
    ];
    
    public function __construct()
    {
        parent::__construct(self::TOTAL);
    }
}
