<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I100 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I100: CENTRO DE CUSTOS
 */
class I100 extends Element implements ElementInterface
{
    const REG = 'I100';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'dt_alt'       => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data de inclusao/alteracao.',
            'format'   => ''
        ],
        'cod_ccus'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código do Centro de Custos',
            'format'   => ''
        ],
        'ccus'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome do Centro de Custo',
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
