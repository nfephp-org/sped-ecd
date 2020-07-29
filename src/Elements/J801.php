<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento J801 do Bloco J OBRIGATÓRIO [1:1]
 * REGISTRO J801: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class J801 extends Element implements ElementInterface
{
    const REG = 'J801';
    const LEVEL = 2;
    const PARENT = '';

    protected $parameters = [
        'tipo_doc' => [
            'type'     => 'string',
            'regex'    => '^(001)$',
            'required' => true,
            'info'     => 'Tipo de documento:'
            .' 001: Termo de Verificação para Fins Substituição da ECD.',
            'format'   => ''
        ],
        'desc_rtf' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]$',
            'required' => false,
            'info'     => 'Descrição do arquivo .rtf.',
            'format'   => ''
        ],
        'cod_mot_subs' => [
            'type'     => 'string',
            'regex'    => '^(001|002|003|004|005|099)$',
            'required' => true,
            'info'     => 'Código do motivo da substituição:'
            .' 001: Mudanças de saldos das contas que não podem ser realizadas por meio de lançamentos extemporâneos'
            .' 002: Alteração de assinatura'
            .' 003: Alteração de demonstrações contábeis'
            .' 004: Alteração da forma de escrituração contábil'
            .' 005: Alteração do número do livro'
            .' 099: Outros',
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
