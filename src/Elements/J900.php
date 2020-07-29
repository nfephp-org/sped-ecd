<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J900 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J900: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J900 extends Element implements ElementInterface
{
    const REG = 'J900';
    const LEVEL = 2;
    const PARENT = '';

    protected $parameters = [
        'dnrc_encer' => [
            'type'     => 'string',
            'regex'    => '^(TERMO DE ENCERRAMENTO)$',
            'required' => true,
            'info'     => 'Texto fixo contendo TERMO DE ENCERRAMENTO.',
            'format'   => ''
        ],
        'num_ord' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'Número de ordem do instrumento de escrituração.',
            'format'   => ''
        ],
        'nat_livro' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{80}$',
            'required' => true,
            'info'     => 'Natureza do livro; finalidade a que se destinou o instrumento.',
            'format'   => ''
        ],
        'nome' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome empresarial.',
            'format'   => ''
        ],
        'num_lin' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'Quantidade total de linhas do arquivo digital.',
            'format'   => ''
        ],
        'dt_ini_escr'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data inicial da escrituração.',
            'format'   => ''
        ],
        'dt_fin_escr'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data de término da escrituração.',
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
