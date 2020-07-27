<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I355 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I355: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 * 
 * Alterar campos: vl_cta e vl_cta_mf
 */
class I355 extends Element implements ElementInterface
{
    const REG = 'I355';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_cta' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta analítica de resultado.',
            'format'   => ''
        ],
        'cod_ccus' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código do centro de custos.',
            'format'   => ''
        ],
        'vl_cta'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => true,
            'info'     => 'Valor do saldo final antes do lançamento de encerramento.',
            'format'   => ''
        ],
        'ind_dc' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do saldo final: D - Devedor; C - Credor.',
            'format'   => ''
        ],
        'vl_cta_mf'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => false,
            'info'     => 'Valor do saldo final antes do lançamento de encerramento em moeda funcional, convertido para reais.',
            'format'   => ''
        ],
        'ind_dc_mf' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => false,
            'info'     => 'Indicador da situação do saldo final em moeda funcional: D - Devedor; C - Credor.',
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
