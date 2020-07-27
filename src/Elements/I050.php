<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I050 do Bloco I OBRIGATÓRIO [1:N]
 * EGISTRO I050: PLANO DE CONTAS
 */
class I050 extends Element implements ElementInterface
{
    const REG = 'I050';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'dt_alt'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data de inclusao/alteracao.',
            'format'   => ''
        ],
        'cod_nat'    => [
            'type'     => 'string',
            'regex'    => '^(01|02|03|04|05|09){2}$',
            'required' => true,
            'info'     => 'Código da natureza da conta/grupo de contas, conforme tabela publicada pelo Sped.',
            'format'   => ''
        ],
        'ind_cta'        => [
            'type'     => 'string',
            'regex'    => '^[S-A]{2}$',
            'required' => true,
            'info'     => 'Indicador do tipo de Conta: S-Sintetico, A-Analitico.',
            'format'   => ''
        ],
        'nivel'    => [
            'type'     => 'numeric',
            'regex'    => '^([0-9]*)$',
            'required' => true,
            'info'     => 'Nivel da conta analitica/grupo de contas.',
            'format'   => ''
        ],
        'cod_cta'      => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Codigo da conta analitica/grupo de contas.',
            'format'   => ''
        ],
        'cod_cta_sup'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Codigo da conta sintetica/grupo de contas de nivel imediatamente superior.',
            'format'   => ''
        ],
        'cta'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome da conta analitica/grupo de contas.',
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
