<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J100 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J100: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J100 extends Element implements ElementInterface
{
    const REG = 'J100';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'cod_agl' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código de aglutinação atribuído pela pessoa jurídica.',
            'format'   => ''
        ],
        'ind_cod_agl' => [
            'type'     => 'string',
            'regex'    => '^(T|D)$',
            'required' => true,
            'info'     => 'Indicador do tipo de código de aglutinação das linhas:'
            .' T – Totalizador (nível que totaliza um ou mais níveis inferiores da demonstração financeira)'
            .' D – Detalhe (nível mais detalhado da demonstração financeira)',
            'format'   => ''
        ],
        'nivel_agl' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'Nível do Código de aglutinação (mesmo conceito do plano de contas – Registro I050).',
            'format'   => ''
        ],
        'cod_agl_sup' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código de aglutinação sintético/grupo de código de aglutinação de nível superior.',
            'format'   => ''
        ],
        'ind_grp_bal' => [
            'type'     => 'string',
            'regex'    => '^(A|P)$',
            'required' => true,
            'info'     => 'Indicador de grupo do balanço: A – Ativo; P – Passivo e Patrimônio Líquido.',
            'format'   => ''
        ],
        'descr_cod_agl' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Descrição do Código de aglutinação.',
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
