<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I051 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I051: PLANO DE CONTAS REFERENCIAL
 */
class I051 extends Element implements ElementInterface
{
    const REG = 'I051';
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
        'cod_cta_ref'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Codigo da conta de acordo com Plano de Contas referencial, '
                . 'conforme tabela publicada pelos orgaos indicados no campo '
                . 'COD_PLAN_REF do registro 0000.',
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
