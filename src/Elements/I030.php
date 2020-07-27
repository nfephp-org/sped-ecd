<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I030 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I030: TERMO DE ABERTURA
 */
class I030 extends Element implements ElementInterface
{
    const REG = 'I030';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'dnrc_abert' => [
            'type'     => 'string',
            'regex'    => '^(TERMO DE ABERTURA){17}$',
            'required' => true,
            'info'     => 'Termo de Abertura.',
            'format'   => ''
        ],
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
        'qtd_lin' => [
            'type'     => 'numeric',
            'regex'    => '^([0-9]*)$',
            'required' => true,
            'info'     => '0 - Bloco com dados informados;1- Bloco sem dados informados.',
            'format'   => ''
        ],
        'nome' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome Empresarial.',
            'format'   => ''
        ],
        'nire' => [
            'type'     => 'numeric',
            'regex'    => '^([0-9]){11}$',
            'required' => false,
            'info'     => 'Número de Identificação do Registro de Empresas da Junta Comercial',
            'format'   => ''
        ],
        'cnpj' => [
            'type'     => 'string',
            'regex'    => '^[0-9]{14}$',
            'required' => true,
            'info'     => 'Número de inscrição da entidade no CNPJ.',
            'format'   => ''
        ],
        'dt_arq'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data do arquivamento dos atos constitutivos.',
            'format'   => ''
        ],
        'dt_arq_conv'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data de arquivamento do ato de conversão de sociedade simples em sociedade empresária.',
            'format'   => ''
        ],
        'desc_mun' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Municipio.',
            'format'   => ''
        ],
        'dt_ex_social'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data de encerramento do exercicio social.',
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
