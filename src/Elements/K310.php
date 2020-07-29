<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K310 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K310: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K310 extends Element implements ElementInterface
{
    const REG = 'K310';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'emp_cod_parte'      => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{4}$',
            'required' => true,
            'info'     => 'Código da empresa detentora do valor aglutinado que foi eliminado',
            'format'   => ''
        ],
        'valor'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Parcela do valor eliminado total',
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
