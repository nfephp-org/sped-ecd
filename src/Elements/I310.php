<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I310 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I310: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 *
 * Alterar campos: val_debd / val_credd / val_deb_mf / val_cred_mf
 */
class I310 extends Element implements ElementInterface
{
    const REG = 'I310';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_cta' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da conta analítica debitada/creditada.',
            'format'   => ''
        ],
        'cod_ccus' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Código do centro de custos.',
            'format'   => ''
        ],
        'val_debd'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => true,
            'info'     => 'Total dos débitos do dia.',
            'format'   => ''
        ],
        'val_credd'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => true,
            'info'     => 'Total dos créditos do dia.',
            'format'   => ''
        ],
        'val_deb_mf'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => false,
            'info'     => 'Total dos débitos do dia em moeda funcional, convertido para reais.',
            'format'   => ''
        ],
        'val_cred_mf'     => [
            'type'     => 'string',
            'regex'    => '^[0-9]{19}$',
            'required' => false,
            'info'     => 'Total dos créditos do dia em moeda funcional, convertido para reais.',
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
