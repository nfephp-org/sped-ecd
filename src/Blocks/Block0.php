<?php

namespace NFePHP\ECD\Blocks;

use NFePHP\ECD\Elements;
use NFePHP\ECD\Common\Block;
use NFePHP\ECD\Common\BlockInterface;

/**
 * Classe constutora do bloco 0 Abertura, Identificação e Referências
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados
 *
 * NOTA: usada a letra z no inicio do elemento devido ao fato de não poder chamar classes
 * apenas com numeros e também para não confundir os com elementos do bloco B
 *
 * @method Elements\Z0000 z0000(\stdClass $std) Constructor element 0000
 * @method Elements\Z0001 z0001(\stdClass $std) Constructor element 0001
 * @method Elements\Z0007 z0007(\stdClass $std) Constructor element 0007
 * @method Elements\Z0020 z0020(\stdClass $std) Constructor element 0020
 * @method Elements\Z0035 z0035(\stdClass $std) Constructor element 0035
 * @method Elements\Z0155 z0150(\stdClass $std) Constructor element 0150
 * @method Elements\Z0180 z0180(\stdClass $std) Constructor element 0180
 */
final class Block0 extends Block implements BlockInterface
{
    const TOTAL = '0990';
    
    public $elements = [
        'z0000' => ['class' => Elements\Z0000::class, 'level' => 0, 'type' => 'single'],
        'z0001' => ['class' => Elements\Z0001::class, 'level' => 1, 'type' => 'single'],
        'z0007' => ['class' => Elements\Z0007::class, 'level' => 2, 'type' => 'multiple'],
        'z0015' => ['class' => Elements\Z0020::class, 'level' => 2, 'type' => 'multiple'],
        'z0100' => ['class' => Elements\Z0035::class, 'level' => 2, 'type' => 'multiple'],
        'z0150' => ['class' => Elements\Z0150::class, 'level' => 2, 'type' => 'multiple'],
        'z0180' => ['class' => Elements\Z0180::class, 'level' => 3, 'type' => 'multiple'],
    ];
    
    public function __construct()
    {
        parent::__construct(self::TOTAL);
    }
}
