<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J005 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J005: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J005 extends Element implements ElementInterface
{
    const REG = 'J005';
    const LEVEL = 2;
    const PARENT = '';

    protected $parameters = [
        'dt_ini'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data inicial das demonstrações contábeis.',
            'format'   => ''
        ],
        'dt_fin'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data final das demonstrações contábeis.',
            'format'   => ''
        ],
        'id_dem' => [
            'type'     => 'numeric',
            'regex'    => '^[1-2]{1}$',
            'required' => true,
            'info'     => 'Identificação das demonstrações:'
            .' 1 – demonstrações contábeis da pessoa jurídica a que se refere a escrituração;'
            .' 2 – demonstrações consolidadas ou de outras pessoas jurídicas.',
            'format'   => ''
        ],
        'cab_dem'     => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{65535}$',
            'required' => false,
            'info'     => 'Cabeçalho das demonstrações.',
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
