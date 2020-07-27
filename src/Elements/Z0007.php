<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento 0007 do Bloco 0 OPCIONAL [0:N]
 * REGISTRO 0007: OUTRAS INSCRIÇÕES CADASTRAIS DA PESSOA JURÍDICA
 */
class Z0007 extends Element implements ElementInterface
{
    const REG = '0007';
    const LEVEL = 2;
    const PARENT = '0001';

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
            'regex'    => '^.{1,25}$',
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
