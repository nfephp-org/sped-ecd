<?php

namespace NFePHP\ECD\Elements;

use NFePHP\ECD\Common\Element;
use NFePHP\ECD\Common\ElementInterface;
use \stdClass;

/**
 * Elemento 0000 do Bloco 0 OBRIGATÓRIO [1:1]
 * REGISTRO 0000: ABERTURA DO ARQUIVO DIGITAL E IDENTIFICAÇÃO DO EMPRESÁRIO OU DA SOCIEDADE EMPRESÁRIA
 */
class Z0000 extends Element implements ElementInterface
{
    const REG = '0000';
    const LEVEL = 0;
    const PARENT = '';
    
    protected $parameters = [
        'lecd' => [
            'type'     => 'string',
            'regex'    => '^(LECD)$',
            'required' => true,
            'info'     => 'Texto fixo contendo LECD.',
            'format'   => ''
        ],
        'dt_ini'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data inicial das informações contidas no arquivo.',
            'format'   => ''
        ],
        'dt_fin'     => [
            'type'     => 'string',
            'regex'    => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info'     => 'Data final das informações contidas no arquivo.',
            'format'   => ''
        ],
        'nome'      => [
            'type'     => 'string',
            'regex'    => '^.{2,100}$',
            'required' => true,
            'info'     => 'Nome empresarial da entidade.',
            'format'   => ''
        ],
        'cnpj'      => [
            'type'     => 'string',
            'regex'    => '^[0-9]{14}$',
            'required' => true,
            'info'     => 'Número de inscrição da entidade no CNPJ.',
            'format'   => ''
        ],
        'uf'        => [
            'type'     => 'string',
            'regex'    => '^[A-Z]{2}$',
            'required' => true,
            'info'     => 'Sigla da unidade da federação da entidade.',
            'format'   => ''
        ],
        'ie'        => [
            'type'     => 'string',
            'regex'    => '^[0-9]{2,14}$',
            'required' => false,
            'info'     => 'Inscrição Estadual da entidade.',
            'format'   => ''
        ],
        'cod_mun'    => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{7}$',
            'required' => false,
            'info'     => 'Código  do  município  do  domicílio  fiscal  da  '
            . 'entidade, conforme a tabela IBGE',
            'format'   => ''
        ],
        'im'        => [
            'type'     => 'string',
            'regex'    => '^[A-Za-z0-9]{1,15}$',
            'required' => false,
            'info'     => 'Inscrição Municipal da entidade.',
            'format'   => ''
        ],
        'ind_sit_esp' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{1}$',
            'required' => false,
            'info'     => 'Indicador de situação especial (conforme tabela publicada pelo Sped).',
            'format'   => ''
        ],
        'ind_sit_ini_per' => [
            'type'     => 'numeric',
            'regex'    => '^[0-9]{1}$',
            'required' => true,
            'info'     => 'Indicador de situação no início do período.',
            'format'   => ''
        ],
        'ind_nire' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => 'Indicador de existência de NIRE',
            'format'   => ''
        ],
        'ind_fin_esc' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => 'Indicador de finalidade da escrituração: 0 - Original 1 – Substituta',
            'format'   => ''
        ],
        'cod_hash_sub' => [
            'type'     => 'string',
            'regex'    => '^.{1,40}$',
            'required' => false,
            'info'     => 'Hash da escrituração substituída.',
            'format'   => ''
        ],
        'ind_grande_porte' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => 'Indicador de entidade sujeita a auditoria independente:'
                . '0 – Empresa não é entidade sujeita a auditoria independente. '
                . '1 – Empresa é entidade sujeita a auditoria independente – Ativo '
                . 'Total superior a R$ 240.000.000,00 ou Receita Bruta Anual superior R$300.000.000,00.',
            'format'   => ''
        ],
        'tip_ecd' => [
            'type'     => 'numeric',
            'regex'    => '^[0-2]{1}$',
            'required' => true,
            'info'     => 'Indicador do tipo de ECD: '
                . '0 – ECD de empresa não participante de SCP como sócio ostensivo. '
                . '1 – ECD de empresa participante de SCP como sócio ostensivo. '
                . '2 – ECD da SCP.',
            'format'   => ''
        ],
        'cod_scp' => [
            'type'     => 'string',
            'regex'    => '^[0-9]{14}$',
            'required' => false,
            'info'     => 'CNPJ da SCP. Observação: '
                . 'Só deve ser preenchido pela própria SCP com o CNPJ da SCP '
                . '(Não é preenchido pelo sócio ostensivo)',
            'format'   => ''
        ],
        'ident_mf' => [
            'type'     => 'string',
            'regex'    => '^(S|N)$',
            'required' => true,
            'info'     => 'Identificação de moeda funcional',
            'format'   => ''
        ],
        'ind_esc_cons' => [
            'type'     => 'string',
            'regex'    => '^(S|N)$',
            'required' => true,
            'info'     => 'Escriturações Contábeis Consolidadas',
            'format'   => ''
        ],
        'ind_centralizada' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => '0 – Escrituração Centralizada 1 – Escrituração Descentralizada',
            'format'   => ''
        ],
        'ind_mudanc_pc' => [
            'type'     => 'numeric',
            'regex'    => '^[0-1]{1}$',
            'required' => true,
            'info'     => '0 – Não houve mudança no plano de contas. 1 – Houve mudança no plano de contas.',
            'format'   => ''
        ],
        'cod_plan_ref' => [
            'type'     => 'numeric',
            'regex'    => '^(1|2|3|4|5|6|7|8|9|10)$',
            'required' => false,
            'info'     => 'Código do Plano de Contas Referencial que será utilizado '
                . 'para o mapeamento de todas as contas analíticas',
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
