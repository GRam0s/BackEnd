<?php

class carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $Ndonos;

    public function __construct($marca, $modelo, $ano, $revisao, $Ndonos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->Ndonos = $Ndonos;
    }
}

$carro1 = new carro("Porsche", "911", 2020, false, 3);
$carro2 = new carro("Mitsubishi", "Lancer", 1997, true, 1);
$carro3 = new carro("Ford", "Mustang Shelby GT500", 2019, true, 2);
$carro4 = new carro("Cadillac", "Deville", 1960, true, 6);
$carro5 = new carro("Audi", "R8", 2020, true,2);
$carro6 = new carro("Chevrovet", "Corvette", 1972, false, 8);