<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K001 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K001: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K001 extends Element implements ElementInterface
{
    const REG = 'K001';
    const LEVEL = 1;
    const PARENT = '';

    protected $parameters = [
        'ind_dad' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => 'Indicador de movimento: 0- Bloco com dados informados; 1- Bloco sem dados informados.',
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
