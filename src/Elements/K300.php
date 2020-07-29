<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K300 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K300: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K300 extends Element implements ElementInterface
{
    const REG = 'K300';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'cod_cta'      => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta consolidada',
            'format'   => ''
        ],
        'val_ag'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor absoluto aglutinado',
            'format'   => '19v2'
        ],
        'ind_val_ag' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do valor aglutinado:'
                . ' D – Devedor;'
                . ' C – Credor.',
            'format'   => ''
        ],
        'val_el'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor absoluto das eliminações',
            'format'   => '19v2'
        ],
        'ind_val_el' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do valor eliminado:'
                . ' D – Devedor;'
                . ' C – Credor.',
            'format'   => ''
        ],
        'val_cs'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor absoluto consolidado: val_cs = val_ag – val_el',
            'format'   => '19v2'
        ],
        'ind_val_cs' => [
            'type'     => 'string',
            'regex'    => '^(D|C)$',
            'required' => true,
            'info'     => 'Indicador da situação do valor consolidado:'
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
