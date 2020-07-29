<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K210 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K210: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K210 extends Element implements ElementInterface
{
    const REG = 'K210';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_emp'      => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{4}$',
            'required' => true,
            'info'     => 'Código de identificação da empresa participante',
            'format'   => ''
        ],
        'cod_cta_emp'      => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta da empresa participante',
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
