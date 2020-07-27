<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I075 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I075: TABELA DE HISTÓRICO PADRONIZADO
 */
class I075 extends Element implements ElementInterface
{
    const REG = 'I075';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'cod_hist'     => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Codigo do historico padronizado.',
            'format'   => ''
        ],
        'descr_hist'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Descricao do historico padronizado',
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
