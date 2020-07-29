<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J210 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J210: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J210 extends Element implements ElementInterface
{
    const REG = 'J210';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'ind_tip' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => 'Indicador do tipo de demonstração:'
            .' 0 – DLPA – Demonstração de Lucro ou Prejuízos Acumulados'
            .' 1 – DMPL – Demonstração de Mutações do Patrimônio Líquido',
            'format'   => ''
        ],
        'cod_agl' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código de aglutinação atribuído pela pessoa jurídica.',
            'format'   => ''
        ],
        'descr_cod_agl' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Descrição do código de aglutinação.',
            'format'   => ''
        ],
        'vl_cta_ini'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor inicial do código de aglutinação no Balanço Patrimonial no exercício '
                . 'informado, ou de período definido em norma específica.',
            'format'   => '19v2'
        ],
        'ind_dc_cta_ini' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do saldo inicial informado no campo anterior: '
                . 'D - Devedor; C – Credor.',
            'format'   => ''
        ],
        'vl_cta_fin'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor final do código de aglutinação no Balanço Patrimonial no exercício informado, '
                . 'ou de período definido em norma específica.',
            'format'   => '19v2'
        ],
        'ind_dc_cta_fin' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do saldo final informado no campo anterior: D - Devedor; C – Credor.',
            'format'   => ''
        ],
        'nota_exp_ref' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{12}$',
            'required' => false,
            'info'     => 'Referência a numeração das notas explicativas relativas às demonstrações contábeis.',
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
