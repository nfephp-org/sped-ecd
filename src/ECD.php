<?php

namespace NFePHP\ECD;

use NFePHP\ECD\Common\BlockInterface;

class ECD
{
    protected $possibles = [
        'block0' => ['class' => Blocks\Block0::class, 'order' => 1], //Abertura, Identificação e Referências
        'blockc' => ['class' => Blocks\BlockC::class, 'order' => 2], //Informações Recuperadas da ECD Anterior
        'blocki' => ['class' => Blocks\BlockI::class, 'order' => 3], //Lançamentos Contábeis
        'blockj' => ['class' => Blocks\BlockJ::class, 'order' => 4], //Demonstrações Contábeis
        'blockk' => ['class' => Blocks\BlockK::class, 'order' => 5], //Conglomerados Econômicos
    ];
    
    protected $qtd_lin = 0;

    public function __construct()
    {
        //todo
    }

    /**
     * Add
     * @param BlockInterface $block
     */
    public function add(BlockInterface $block = null)
    {
        if (empty($block)) {
            return;
        }
        $name = strtolower((new \ReflectionClass($block))->getShortName());
        if (key_exists($name, $this->possibles)) {
            $this->{$name} = $block->get();
        }
    }

    /**
     * Create a ECD string
     */
    public function get()
    {
        $ecd = '';
        $keys = array_keys($this->possibles);
        foreach ($keys as $key) {
            if (isset($this->$key)) {
                $ecd .= $this->$key;
            }
        }
        $ecd .= $this->totalize($ecd);
        $ecd = $this->adjustI030J900($ecd);
        return $ecd;
    }

    /**
     * Totals blocks contents
     * @param string $ecd
     * @return string
     */
    protected function totalize($ecd)
    {
        $tot = '';
        $keys = [];
        $aecd = explode("\n", $ecd);
        foreach ($aecd as $element) {
            $param = explode("|", $element);
            if (!empty($param[1])) {
                $key = $param[1];
                if (!empty($keys[$key])) {
                    $keys[$key] += 1;
                } else {
                    $keys[$key] = 1;
                }
            }
        }
        //Inicializa o bloco 9
        $tot .= "|9001|0|\n";
        $n = 0;
        foreach ($keys as $key => $value) {
            if (!empty($key)) {
                $tot .= "|9900|$key|$value|\n";
                $n++;
            }
        }
        $n++;
        $tot .= "|9900|9001|1|\n";
        $tot .= "|9900|9900|". ($n+3)."|\n";
        $tot .= "|9900|9990|1|\n";
        $tot .= "|9900|9999|1|\n";
        $tot .= "|9990|". ($n+6) ."|\n";
        $ecd .= $tot;
        $n = count(explode("\n", $ecd));
        $tot .= "|9999|$n|\n";
        $this->qtd_lin = $n;
        return $tot;
    }
    
    /**
     * Ajusta os campos qtd_lin dos elementos I030 e J900
     *
     * @param string $ecd
     *
     * @return string
     */
    protected function adjustI030J900($ecd)
    {
        $aecd = explode("\n", $ecd);
        $i = 0;
        foreach ($aecd as $element) {
            $param = explode("|", $element);
            if (!empty($param[1])) {
                if ($param[1] == 'I030') {
                    $i030 = "|I030"
                    . "|{$param[2]}"
                    . "|{$param[3]}"
                    . "|{$param[4]}"
                    . "|{$this->qtd_lin}"
                    . "|{$param[6]}"
                    . "|{$param[7]}"
                    . "|{$param[8]}"
                    . "|{$param[9]}"
                    . "|{$param[10]}"
                    . "|{$param[11]}"
                    . "|{$param[12]}|";
                    $aecd[$i] = $i030;
                }
                if ($param[1] == 'J900') {
                    $j900 = "|J900"
                        . "|{$param[2]}"
                        . "|{$param[3]}"
                        . "|{$param[4]}"
                        . "|{$param[5]}"
                        . "|{$this->qtd_lin}"
                        . "|{$param[7]}"
                        . "|{$param[8]}|";
                    $aecd[$i] = $j900;
                    //ultimo campo a ser ajustado pode parar o loop
                    break;
                }
                $i++;
            }
        }
        return implode("\n", $aecd);
    }
}
