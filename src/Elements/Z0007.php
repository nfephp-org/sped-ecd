<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento 0000 do Bloco 0 OBRIGATÓRIO [1:1]
 * REGISTRO 0000: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class Z0007 extends Element implements ElementInterface
{
    const REG = '0007';
    const LEVEL = 1;
    const PARENT = '0000';

    protected $parameters = [
        'cod_ent_ref'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{2}$',
            'required' => false,
            'info'     => 'Código da instituição responsável pela administração docadastro.',
            'format'   => ''
        ],
        'cod_inscr'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código cadastral da pessoa jurídica na instituição identificada no campo COD_ENT_REF.',
            'format'   => ''
        ],
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
