<?php
/**
 * Classe Abstrata com injecao de dependencia
 *  criar vário objetos diferentes
 *  várias implementações diferentes p/mesma classe abstrata
 */

interface APIDesenho
{
    public function desenharCirculo($x, $y, $raio);
}

class APIDesenho1 implements APIDesenho
{
    public function desenharCirculo($x, $y, $raio) {
        echo "Desenhando Circulo, V1: ".$x." - ".$y." - ".$raio;
    }
}

class APIDesenho2 implements APIDesenho
{
    public function desenharCirculo($x, $y, $raio) {
        echo "Desenhando Circulo, V2: ".$x." - ".$y." - ".$raio;
    }
}

abstract class Forma
{
    protected $api;
    protected $x;
    protected $y;
    
    
    public function __construct(APIDesenho $api)
    {
        $this->api = $api;
    }
}

class Circulo extends Forma
{
    protected $raio;
    
    public function __construct($x, $y, $raio, APIDesenho $api) {
        parent::__construct($api);
        $this->x = $x;
        $this->y = $y;
        $this->raio = $raio;
    }
    
    public function desenhar()
    {
        $this->api->desenharCirculo($this->x, $this->y, $this->raio);
    }
}

$circulo = new Circulo(1, 3, 7, new APIDesenho2());
$circulo->desenhar();

?>