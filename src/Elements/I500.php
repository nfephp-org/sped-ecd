<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I500 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I500: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA 
 */
class I500 extends Element implements ElementInterface
{
    const REG = 'I500';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'tam_fonte' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{2}$',
            'required' => true,
            'info'     => 'Tamanho da fonte.',
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
