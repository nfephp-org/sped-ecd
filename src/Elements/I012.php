<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I012 do Bloco I OBRIGATÓRIO [1:N]
 * REGISTRO I012: LIVROS AUXILIARES AO DIÁRIO OU LIVRO PRINCIPAL
 */
class I012 extends Element implements ElementInterface
{
    const REG = 'I012';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'num_ord'    => [
            'type'     => 'numeric',
            'regex'    => '^([1-9][0-9]*)$',
            'required' => true,
            'info'     => 'Número de ordem do instrumento associado.',
            'format'   => ''
        ],
        'nat_liv' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{80}$',
            'required' => true,
            'info'     => 'Natureza do livro associado; finalidade a que se destina o instrumento.',
            'format'   => ''
        ],
        'tipo' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => '0 - Bloco com dados informados;1- Bloco sem dados informados.',
            'format'   => ''
        ],
        'cod_hash_aux' => [
            'type'     => 'string',
            'regex'    => '^.{1,40}$',
            'required' => false,
            'info'     => 'Código Hash do arquivo correspondente ao livro auxiliar utilizado na assinatura digital.',
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
