<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I010 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I010: IDENTIFICAÇÃO DA ESCRITURAÇÃO CONTÁBIL
 */
class I010 extends Element implements ElementInterface
{
    const REG = 'I010';
    const LEVEL = 2;
    const PARENT = '';

    protected $parameters = [
        'ind_esc'    => [
            'type'     => 'string',
            'regex'    => '^[G|R|A|B|Z]{1}$',
            'required' => true,
            'info'     => 'Indicador da forma de escrituração contábi.',
            'format'   => ''
        ],
        'cod_ver_lc' => [
            'type'     => 'string',
            'regex'    => '^(8.00)$',
            'required' => true,
            'info'     => 'Código da versao do layout contabil.',
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
