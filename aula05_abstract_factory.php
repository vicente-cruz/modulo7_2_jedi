<?php
/**
 * Abstract Factory: Varias Factory com funções semelhantes que trabalham juntas
 */
// Exemplo: plataforma EAD
// 1º
abstract class Video
{
    abstract public function render();
}

// 7º Abstract Factory
abstract class AbstractFactory
{
    abstract public function createPlayer($url);
}

// 2º
class HtmlFactory extends AbstractFactory
{
    public function createPlayer($url)
    {
        return new HtmlPlayer($url);
    }
}

// 3º
class HtmlPlayer extends Video
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function render()
    {
        echo "<video>".$this->url."</video>";
    }
}

// 5º
class FlashFactory extends AbstractFactory
{
    public function createPlayer($url)
    {
        return new FlashPlayer($url);
    }
}
// 6º
class FlashPlayer extends Video
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }
    
    public function render()
    {
        echo "<object>".$this->url."</object>";
    }

}

// 4º
// Simple Factory
//$fac = new HtmlFactory();
$fac = new FlashFactory();

$player = $fac->createPlayer("123");
$player->render();
?>