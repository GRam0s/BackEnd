<?php
class Animal {
    private $especie;
    private $habitat;
    private $sexo;
    private $alimentacao;

    public function __construct($especie, $habitat, $sexo, $alimentacao) {
        $this->setEspecie($especie);
        $this->setHabitat($habitat);
        $this->setSexo($sexo);
        $this->setAlimentacao($alimentacao);
    } 

    public function getEspecie() {
        return $this->especie;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function getHabitat() {
        return $this->habitat;
    }

    public function setHabitat($habitat) {
        $this->habitat = $habitat;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getAlimentacao() {
        return $this->alimentacao;
    }

    public function setAlimentacao($alimentacao) {
        $this->sexo = $alimentacao;
    }
}   

class Cachorros extends Animal {
    private $raca;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $raca) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->setRaca($raca);
    }

    public function getRaca() {
        return $this->raca;
    }

    public function setRaca($raca) {
        $this->raca = $raca;
    }
}

class Pangolim extends Animal {
    private $N_escamas;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $N_escamas) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->N_escamas = $N_escamas;
    }
}

class Macaco extends Animal {
    private $tempo_dormindo;
    private $bananas_dia;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $tempo_dormindo, $bananas_dia) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this -> tempo_dormindo = $tempo_dormindo;
        $this -> bananas_dia = $bananas_dia;
    }
}

class Gato extends Animal {
    private $tipo_ronroamento;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $tipo_ronroamento) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->tipo_ronroamento = $tipo_ronroamento;
    }
}
?>
