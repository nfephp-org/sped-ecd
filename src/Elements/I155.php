<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I155 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I155: DETALHE DOS SALDOS PERIÓDICOS
 */
class I155 extends Element implements ElementInterface
{
    const REG = 'I155';
    const LEVEL = 4;
    const PARENT = 'I150';

    protected $parameters = [
        'cod_cta'  => [
            'type'     => 'string',
            'regex'    => '^.*$',
            'required' => true,
            'info'     => 'Código da conta analitica',
            'format'   => ''
        ],
        'cod_ccus'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código do Centro de Custos',
            'format'   => ''
        ],
        'vl_sld_ini'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor do saldo inicial do período.',
            'format'   => '19v2'
        ],
        'ind_dc_ini' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => false,
            'info'     => 'Indicador da situacao do saldo inicial: D-Devedor; C-Credor',
            'format'   => ''
        ],
        'vl_deb'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor total dos debitos no periodo',
            'format'   => '19v2'
        ],
        'vl_cred'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor total dos creditos no periodo',
            'format'   => '19v2'
        ],
        'vl_sld_fin'    => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor total dos creditos no periodo',
            'format'   => '19v2'
        ],
        'ind_dc_fin' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => false,
            'info'     => 'Indicador da situacao do saldo final: D-Devedor; C-Credor',
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
