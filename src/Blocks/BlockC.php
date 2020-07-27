<?php

namespace NFePHP\ECD\Blocks;

use NFePHP\ECD\Elements;
use NFePHP\ECD\Common\Block;
use NFePHP\ECD\Common\BlockInterface;

/**
 * Classe constutora do bloco C Informações Recuperadas da ECD Anterior
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados
 *
 * @method Elements\C001 c001(\stdClass $std) Constructor element C001
 * @method Elements\C040 c040(\stdClass $std) Constructor element C040
 * @method Elements\C150 c150(\stdClass $std) Constructor element C150
 * @method Elements\C155 c155(\stdClass $std) Constructor element C155
 * @method Elements\C600 c600(\stdClass $std) Constructor element C600
 * @method Elements\C650 c650(\stdClass $std) Constructor element C650
 */
final class BlockC extends Block implements BlockInterface
{
    const TOTAL = 'C990';
    
    public $elements = [
        'c001' => ['class' => Elements\C001::class, 'level' => 1, 'type' => 'single'],
        'c040' => ['class' => Elements\C040::class, 'level' => 2, 'type' => 'single'],
        'c150' => ['class' => Elements\C150::class, 'level' => 3, 'type' => 'single'],
        'c155' => ['class' => Elements\C155::class, 'level' => 4, 'type' => 'multiple'],
        'c600' => ['class' => Elements\C600::class, 'level' => 3, 'type' => 'multiple'],
        'c650' => ['class' => Elements\C650::class, 'level' => 4, 'type' => 'multiple'],
    ];
    
    public function __construct()
    {
        parent::__construct(self::TOTAL);
    }
}
