<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J932 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J932: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 *
 * OBS.: Fazer verificacao de tamanho do campo ident_cpf_cnpj_t quando preencher os dados;
 */
class J932 extends Element implements ElementInterface
{
    const REG = 'J932';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'ident_nom_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z]$',
            'required' => true,
            'info'     => 'Nome do signatário.',
            'format'   => ''
        ],
        'ident_cpf_cnpj_t' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]$',
            'required' => true,
            'info'     => 'CPF ou CNPJ',
            'format'   => ''
        ],
        'ident_qualif_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Qualificação do assinante, conforme tabela.',
            'format'   => ''
        ],
        'cod_assin_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{3}$',
            'required' => true,
            'info'     => 'Código de qualificação do assinante, conforme tabela.',
            'format'   => ''
        ],
        'ind_crc_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Número de inscrição do contabilista no Conselho Regional de Contabilidade.',
            'format'   => ''
        ],
        'email_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{60}$',
            'required' => false,
            'info'     => 'Email do signatário.',
            'format'   => ''
        ],
        'fone_t' => [
            'type'     => 'string',
            'regex'    => '^[0-9]{14}$',
            'required' => false,
            'info'     => 'Telefone do signatário.',
            'format'   => ''
        ],
        'uf_crc_t' => [
            'type'     => 'string',
            'regex'    => '^[A-Z]{2}$',
            'required' => false,
            'info'     => 'Indicação da unidade da federação que expediu o CRC.',
            'format'   => ''
        ],
        'num_seq_crc_t' => [
            'type'     => 'string',
            'regex'    => '^[0-9]$',
            'required' => false,
            'info'     => 'Número da Certidão de Regularidade Profissional do Contador no '
                . 'seguinte formato: UF/ano/número',
            'format'   => ''
        ],
        'dt_crc_t'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => false,
            'info'     => 'Data de validade da Certidão de Regularidade Profissional do Contador.',
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
