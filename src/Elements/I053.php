<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I053 do Bloco I OBRIGATÓRIO [0:N]
 * REGISTRO I053: SUBCONTAS CORRELATAS
 */
class I053 extends Element implements ElementInterface
{
    const REG = 'I053';
    const LEVEL = 4;
    const PARENT = '';

    protected $parameters = [
        'cod_idt'     => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{6}$',
            'required' => true,
            'info'     => 'Codigo de identificacao do grupo de conta-subcontas.',
            'format'   => ''
        ],
        'cod_cnt_corr'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Código da subconta correlata (deve estar no plano de contas '
                . 'e só pode estar relacionada a um único grupo)',
            'format'   => ''
        ],
        'nat_sub_cnt'  => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{2}$',
            'required' => true,
            'info'     => 'Natureza da subconta correlata (conforme tabela de '
                . 'natureza da subconta publicada no Sped )',
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
