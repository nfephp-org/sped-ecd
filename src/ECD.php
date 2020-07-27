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
     * Create a EFD string
     */
    public function get()
    {
        $efd = '';
        $keys = array_keys($this->possibles);
        foreach ($keys as $key) {
            if (isset($this->$key)) {
                $efd .= $this->$key;
            }
        }
        $efd .= $this->totalize($efd);
        return $efd;
    }

    /**
     * Totals blocks contents
     * @param string $efd
     * @return string
     */
    protected function totalize($efd)
    {
        $tot = '';
        $keys = [];
        $aefd = explode("\n", $efd);
        foreach ($aefd as $element) {
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
        $efd .= $tot;
        $n = count(explode("\n", $efd));
        $tot .= "|9999|$n|\n";
        return $tot;
    }
}
