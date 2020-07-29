<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K115 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K115: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K115 extends Element implements ElementInterface
{
    const REG = 'K115';
    const LEVEL = 5;
    const PARENT = '';

    protected $parameters = [
        'emp_cod_part'        => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{4}$',
            'required' => true,
            'info'     => 'Código da empresa envolvida na operação.',
            'format'   => ''
        ],
        'evento' => [
            'type'     => 'numeric',
            'regex'    => '^(1|2|3)$',
            'required' => true,
            'info'     => 'Condição da empresa relacionada à operação:'
            .' 1 – Sucessora;'
            .' 2 – Adquirente;'
            .' 3 – Alienante.',
            'format'   => ''
        ],
        'per_evt'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Percentual da empresa participante envolvida na operação.',
            'format'   => '8v4'
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
