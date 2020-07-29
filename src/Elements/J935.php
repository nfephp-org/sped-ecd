<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J935 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J935: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 *
 * OBS.: Fazer verificacao de tamanho do campo ident_cpf_cnpj_t quando preencher os dados;
 */
class J935 extends Element implements ElementInterface
{
    const REG = 'J935';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'ni_cpf_cnpj' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'CPF do auditor independente/CNPJ da pessoa jurídica de auditoria independente.',
            'format'   => ''
        ],
        'nome_auditor_firma' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z]$',
            'required' => true,
            'info'     => 'Nome do auditor independente ou pessoa jurídica de auditoria independente.',
            'format'   => ''
        ],
        'cod_assin_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{3}$',
            'required' => false,
            'info'     => 'Registro do auditor independente na CVM.',
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
