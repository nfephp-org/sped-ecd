<?php

namespace NFePHP\ECD\Blocks;

use NFePHP\ECD\Elements;
use NFePHP\ECD\Common\Block;
use NFePHP\ECD\Common\BlockInterface;

/**
 * Classe constutora do bloco K Conglomerados Econômicos
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados
 *
 * @method Elements\K001 k001(\stdClass $std) Constructor element K001
 * @method Elements\K030 k030(\stdClass $std) Constructor element K030
 * @method Elements\K100 k100(\stdClass $std) Constructor element K100
 * @method Elements\K110 k110(\stdClass $std) Constructor element K110
 * @method Elements\K115 k115(\stdClass $std) Constructor element K115
 * @method Elements\K200 k200(\stdClass $std) Constructor element K200
 * @method Elements\K210 k210(\stdClass $std) Constructor element K210
 * @method Elements\K300 k300(\stdClass $std) Constructor element K300
 * @method Elements\K310 k310(\stdClass $std) Constructor element K310
 * @method Elements\K315 k315(\stdClass $std) Constructor element K315
 */
final class BlockK extends Block implements BlockInterface
{
    const TOTAL = 'K990';

    public $elements = [
        'k001' => ['class' => Elements\K001::class, 'level' => 1, 'type' => 'single'],
        'k030' => ['class' => Elements\K030::class, 'level' => 2, 'type' => 'single'],
        'k100' => ['class' => Elements\K100::class, 'level' => 3, 'type' => 'multiple'],
        'k110' => ['class' => Elements\K110::class, 'level' => 4, 'type' => 'multiple'],
        'k115' => ['class' => Elements\K115::class, 'level' => 5, 'type' => 'multiple'],
        'k200' => ['class' => Elements\K200::class, 'level' => 2, 'type' => 'multiple'],
        'k210' => ['class' => Elements\K210::class, 'level' => 3, 'type' => 'multiple'],
        'k300' => ['class' => Elements\K300::class, 'level' => 3, 'type' => 'multiple'],
        'k310' => ['class' => Elements\K310::class, 'level' => 4, 'type' => 'multiple'],
        'k315' => ['class' => Elements\K315::class, 'level' => 5, 'type' => 'multiple'],
    ];

    public function __construct()
    {
        parent::__construct(self::TOTAL);
    }
}
