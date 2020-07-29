<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J800 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J800: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J800 extends Element implements ElementInterface
{
    const REG = 'J800';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'tipo_doc' => [
            'type'     => 'string',
            'regex'    => '^(001|002|003|010|011|012|099)$',
            'required' => true,
            'info'     => 'Tipo de documento:'
            .' 001: Demonstração do Resultado Abrangente do Período'
            .' 002: Demonstração dos Fluxos de Caixa'
            .' 003: Demonstração do Valor Adicionado'
            .' 010: Notas Explicativas'
            .' 011: Relatório da Administração'
            .' 012: Parecer dos Auditores'
            .' 099: Outros',
            'format'   => ''
        ],
        'desc_rtf' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Descrição do arquivo .rtf.',
            'format'   => ''
        ],
        'hash_rtf' => [
            'type'     => 'string',
            'regex'    => '^.{1,40}$',
            'required' => false,
            'info'     => 'Hash do arquivo .rtf incluído.',
            'format'   => ''
        ],
        'arq_rtf' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => true,
            'info'     => 'Sequência de bytes que representem um único arquivo no formato RTF (Rich Text Format).',
            'format'   => ''
        ],
        'ind_fim_rtf' => [
            'type'     => 'string',
            'regex'    => '^(J800FIM)$',
            'required' => true,
            'info'     => 'Indicador de fim do arquivo RTF. Texto fixo contendo J800FIM.',
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
