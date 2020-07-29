<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K200 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K200: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K200 extends Element implements ElementInterface
{
    const REG = 'K200';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'cod_nat'      => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{2}$',
            'required' => true,
            'info'     => 'Código da natureza da conta/grupo de contas, conforme tabela publicada pelo Sped.',
            'format'   => ''
        ],
        'ind_cta' => [
            'type'     => 'string',
            'regex'    => '^(S|A)$',
            'required' => true,
            'info'     => 'Indicador do tipo de conta:'
                . ' S - Sintética (grupo de contas);'
                . ' A - Analítica (conta).',
            'format'   => ''
        ],
        'nivel'        => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'Nível da conta.',
            'format'   => ''
        ],
        'cod_cta'        => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta.',
            'format'   => ''
        ],
        'cod_cta_sup'        => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código da conta superior',
            'format'   => ''
        ],
        'cta'        => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome da conta.',
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
