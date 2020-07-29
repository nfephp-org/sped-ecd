<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I200 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I200: LANÇAMENTO CONTÁBIL
 */
class I200 extends Element implements ElementInterface
{
    const REG = 'I200';
    const LEVEL = 3;
    const PARENT = 'I010';

    protected $parameters = [
        'num_lcto'      => [
            'type'     => 'string',
            'regex'    => '^[0-9]*$',
            'required' => true,
            'info'     => 'Número ou Código de identificação único do lançamento contábil.',
            'format'   => ''
        ],
        'dt_lcto'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data do lançamento.',
            'format'   => ''
        ],
        'vl_lcto'     => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Valor do lancamento.',
            'format'   => '19v2'
        ],
        'ind_lcto' => [
            'type'     => 'string',
            'regex'    => '^(N|E)$',
            'required' => true,
            'info'     => 'Indicador do tipo de lançamento: '
                . 'N - Lançamento normal (todos os lançamentos, exceto os de encerramento das contas de resultado); '
                . 'E - Lançamento de encerramento de contas de resultado. '
                . 'X – Lançamento extemporâneo.',
            'format'   => ''
        ],
        'dt_lcto_ext'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data de ocorrência dos fatos objeto do lançamento extemporâneo.',
            'format'   => ''
        ]
    ];

    // ,
    //     'vl_lcto_mf'     => [
    //         'type'     => 'string',
    //         'regex'    => '^[0-9]{19}$',
    //         'required' => false,
    //         'info'     => 'Valor do lançamento em moeda funcional, convertido para reais.',
    //         'format'   => ''
    //     ]

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
