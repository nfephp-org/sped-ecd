<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento I510 do Bloco I OBRIGATÓRIO [1:1]
 * REGISTRO I510: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA 
 */
class I510 extends Element implements ElementInterface
{
    const REG = 'I510';
    const LEVEL = 3;
    const PARENT = '';

    protected $parameters = [
        'nm_campo' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{16}$',
            'required' => true,
            'info'     => 'Nome do campo, sem espaços em branco ou caractere especial.',
            'format'   => ''
        ],
        'desc_campo' => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{50}$',
            'required' => true,
            'info'     => 'Descrição do campo (utilizada na visualização do Livro Auxiliar).',
            'format'   => ''
        ],
        'tipo_campo' => [
            'type'     => 'string',
            'regex'    => '^(N|C)$',
            'required' => true,
            'info'     => 'Tipo do campo: N – Numérico; C – Caractere.',
            'format'   => ''
        ],
        'tam_campo' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{3}$',
            'required' => true,
            'info'     => 'Tamanho da campo.',
            'format'   => ''
        ],
        'dec_campo' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{2}$',
            'required' => false,
            'info'     => 'Quantidade de casas decimais para campos tipo “N”.',
            'format'   => ''
        ],
        'col_campo' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{3}$',
            'required' => true,
            'info'     => 'Largura da coluna no relatório (em quantidade de caracteres).',
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
