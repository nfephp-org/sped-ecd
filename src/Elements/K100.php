<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento K100 do Bloco K OBRIGATÓRIO [1:1]
 * REGISTRO K100: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class K100 extends Element implements ElementInterface
{
    const REG = 'K100';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'cod_pais'        => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{5}$',
            'required' => true,
            'info'     => 'Código do país da empresa, conforme tabela do Banco Central do Brasil.',
            'format'   => ''
        ],
        'emp_cod'        => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{4}$',
            'required' => true,
            'info'     => 'Código de identificação da empresa participante.',
            'format'   => ''
        ],
        'cnpj'        => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{8}$',
            'required' => false,
            'info'     => 'CNPJ (somente os 8 primeiros dígitos).',
            'format'   => ''
        ],
        'nome' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Nome empresarial.',
            'format'   => ''
        ],
        'per_part'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Percentual de participação total do conglomerado na empresa '
                . 'no final do período consolidado.',
            'format'   => '8v4'
        ],
        'evento' => [
            'type'     => 'string',
            'regex'    => '^(S|N)$',
            'required' => true,
            'info'     => 'Evento societário ocorrido no período: S - Sim / N – Não',
            'format'   => ''
        ],
        'per_cons'        => [
            'type'     => 'numeric',
            'regex'    => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info'     => 'Percentual de consolidação da empresa no final do período consolidado:'
            .' Informar o percentual do resultado da empresa que foi para a consolidação.',
            'format'   => '8v4'
        ],
        'dt_ini_emp'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data inicial do período da escrituração contábil da empresa que foi consolidada.',
            'format'   => ''
        ],
        'dt_fin_emp'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data final do período da escrituração contábil da empresa que foi consolidada.',
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
