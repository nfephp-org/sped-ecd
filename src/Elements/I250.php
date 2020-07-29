<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I250 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I250: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 *
 * Alterar campos: vl_dc / vl_dc_mf
 */
class I250 extends Element implements ElementInterface
{
    const REG = 'I250';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_cta'  => [
            'type'     => 'string',
            'regex'    => '^.*$',
            'required' => true,
            'info'     => 'Código da conta analitica',
            'format'   => ''
        ],
        'cod_ccus' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código do centro de custos.',
            'format'   => ''
        ],
        'vl_dc'     => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor da partida.',
            'format'   => '19v2'
        ],
        'ind_dc' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do saldo final: D - Devedor; C - Credor.',
            'format'   => ''
        ],
        'num_arq' => [
            'type'     => 'string',
            'regex'    => '^[0-9]$',
            'required' => false,
            'info'     => 'Número, Código ou caminho de localização dos documentos arquivados.',
            'format'   => ''
        ],
        'cod_hist_pad' => [
            'type'     => 'string',
            'regex'    => '^([0-9])*$',
            'required' => false,
            'info'     => 'Código do histórico padronizado, conforme tabela I075.',
            'format'   => ''
        ],
        'hist' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{65535}$',
            'required' => false,
            'info'     => 'Código do histórico padronizado, conforme tabela I075.',
            'format'   => ''
        ],
        'cod_part' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código do histórico padronizado, conforme tabela I075.',
            'format'   => ''
        ],
        'vl_dc_mf'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => false,
            'info'     => 'Valor da partida em moeda funcional, convertido para reais.',
            'format'   => ''
        ],
        'ind_dc_mf' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => false,
            'info'     => 'Indicador da natureza da partida em moeda funcional: D - Devedor; C - Credor.',
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
