<?php
/**
 * Dar "sucessores" para as classes
 * ex: Transporte de cargas e limite: moto, carro, caminhao
 */
class Carga
{
    private $peso;
    
    public function __construct($peso)
    {
        $this->peso = $peso;
    }
    
    public function getPeso()
    {
        return $this->peso;
    }
}

class Moto
{
    private $sucessor;
    
    public function setSucessor($sucessor)
    {
        $this->sucessor = $sucessor;
    }
    
    public function transport(Carga $carga)
    {
        if ($carga->getPeso() <= 500) {
            echo "LEVOU DE MOTO!<br/>";
        } else {
            $this->sucessor->transport($carga);
        }
    }
}

class Carro
{
    private $sucessor;
    
    public function setSucessor($sucessor)
    {
        $this->sucessor = $sucessor;
    }
    
    public function transport(Carga $carga)
    {
        if ($carga->getPeso() <= 5000) {
            echo "LEVOU DE CARRO!<br/>";
        } else {
            $this->sucessor->transport($carga);
        }
    }
}

class Caminhao
{
    private $sucessor;
    
    public function setSucessor($sucessor)
    {
        $this->sucessor = $sucessor;
    }
    
    public function transport(Carga $carga)
    {
        if ($carga->getPeso() <= 30000) {
            echo "LEVOU DE CAMINHAO!<br/>";
        } else {
            echo "NAO DEU PARA LEVAR A CARGA!";
        }
    }
}

$carga = new Carga(40000);
$moto = new Moto();
$carro = new Carro();
$caminhao = new Caminhao();

$moto->setSucessor($carro);
$carro->setSucessor($caminhao);

$moto->transport($carga);
?>