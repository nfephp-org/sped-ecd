<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I052 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I052: INDICAÇÃO DOS CÓDIGOS DE AGLUTINAÇÃO
 */
class I052 extends Element implements ElementInterface
{
    const REG = 'I052';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_ccus'     => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Codigo do Centro de Custo.',
            'format'   => ''
        ],
        'cod_agl'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Codigo de aglutinacao utilizado nas demonstracoes '
                . 'contabeis do bloco J (somente para as contas analiticas).',
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
