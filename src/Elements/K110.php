<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K110 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K110: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K110 extends Element implements ElementInterface
{
    const REG = 'K110';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'evento' => [
            'type'     => 'numeric',
            'regex'    => '^(1|2|3|4|5|6|7|8)$',
            'required' => true,
            'info'     => 'Evento societário ocorrido no período:'
            .' 1 – Aquisição'
            .' 2 – Alienação'
            .' 3 – Fusão'
            .' 4 – Cisão Parcial'
            .' 5 – Cisão Total'
            .' 6 – Incorporação'
            .' 7 – Extinção'
            .' 8 – Constituição',
            'format'   => ''
        ],
        'dt_evento'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data do evento societário.',
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
