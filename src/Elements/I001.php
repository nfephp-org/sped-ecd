<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I001 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I001: ABERTURA DO BLOCO I
 */
class I001 extends Element implements ElementInterface
{
    const REG = 'I001';
    const LEVEL = 1;
    const PARENT = '';

    protected $parameters = [
        'ind_dad' => [
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
