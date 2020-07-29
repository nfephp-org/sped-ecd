<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento C001 do Bloco C OBRIGATÓRIO [1:1]
 * REGISTRO C001: ABERTURA DO BLOCO C
 */
class C001 extends Element implements ElementInterface
{
    const REG = 'C001';
    const LEVEL = 1;
    const PARENT = '';

    protected $parameters =
    [
        'ind_dad' =>
        [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => '0 - Bloco com dados informados;1- Bloco sem dadosinformados.',
            'format'   => ''
        ]
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REG);
        $this->std = $this->standarize($std);
        $this->postValidation();
    }
}
