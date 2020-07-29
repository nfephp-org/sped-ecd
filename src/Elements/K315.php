<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K315 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K315: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K315 extends Element implements ElementInterface
{
    const REG = 'K315';
    const LEVEL = 5;
    const PARENT = '';

    protected $parameters = [
        'emp_cod_contra'      => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{4}$',
            'required' => true,
            'info'     => 'Código da empresa da contrapartida',
            'format'   => ''
        ],
        'cod_contra'      => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta consolidada da contrapartida',
            'format'   => ''
        ],
        'valor'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Parcela da contrapartida do valor eliminado total',
            'format'   => '19v2'
        ],
        'ind_valor' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do valor eliminado:'
                . ' D – Devedor;'
                . ' C – Credor.',
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
