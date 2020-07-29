<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J215 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J215: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J215 extends Element implements ElementInterface
{
    const REG = 'J215';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_hist_fat' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código do histórico do fato contábil.',
            'format'   => ''
        ],
        'desc_fat' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Descrição do Fato Contábil',
            'format'   => ''
        ],
        'vl_fat_cont'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor do fato contábil.',
            'format'   => '19v2'
        ],
        'ind_dc_fat' => [
            'type'     => 'string',
            'regex'    => '^(D|C|P|N)$',
            'required' => true,
            'info'     => 'Indicador de situação do saldo informado no campo anterior:'
            .' D – Devedor'
            .' C – Credor'
            .' P – Subtotal ou total positivo'
            .' N – Subtotal ou total negativo',
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
