<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I550 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I550: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class I550 extends Element implements ElementInterface
{
    const REG = 'I550';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'rz_cont' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Conteúdo dos campos mencionados no Registro I510.',
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
