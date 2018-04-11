<?php
/**
 * Classes muito grandes. Ex: Personagem de jogo. Muitas propriedades e métodos
 */

class Character
{
    private $properties;
    
    public function setProperty($pname, $pvalue)
    {
        $this->properties[$pname] = $pvalue;
    }
    
    public function getAllProperties()
    {
        return $this->properties;
    }
}

// Para acoes comuns a todos os personagens
interface BuilderInterface
{
    public function createCharacter();
    
    public function addHelmet();
    public function addWeapon();
    public function addBoots();
    
    public function getCharacter();
}

// O Builder Patter propriamente dito
class MarioBuilder implements BuilderInterface
{
    private $character;
    
    public function createCharacter()
    {
        $this->character = new Character();
    }
    
    public function addHelmet()
    {
        $this->character->setProperty('helmet', 'red');
    }
    
    public function addWeapon()
    {
        $this->character->setProperty("lefthand", "gloves");
        $this->character->setProperty("righthand", "gloves");
    }
    public function addBoots()
    {
        $this->character->setProperty("leftboot", "black boot");
        $this->character->setProperty("rightboot", "black boot");
    }
    
    public function getCharacter()
    {
        return $this->character;
    }
}

// O Builder Patter propriamente dito
class LuigiBuilder implements BuilderInterface
{
    private $character;
    
    public function createCharacter()
    {
        $this->character = new Character();
    }
    
    public function addHelmet()
    {
        $this->character->setProperty('helmet', 'green');
    }
    
    public function addWeapon()
    {
        $this->character->setProperty("lefthand", "white glove");
        $this->character->setProperty("righthand", "white glove");
    }
    public function addBoots()
    {
        $this->character->setProperty("leftboot", "white boot");
        $this->character->setProperty("rightboot", "white boot");
    }
    
    public function getCharacter()
    {
        return $this->character;
    }
}

// Automatizador ou Diretor
class Director
{
    public function build(BuilderInterface $builder)
    {
        $builder->createCharacter();
        
        $builder->addBoots();
        $builder->addHelmet();
        $builder->addWeapon();
        
        return $builder->getCharacter();
    }
}

$director = new Director();

//$mario = (new Director())->build(new MarioBuilder());
$mario = $director->build(new MarioBuilder());
print_r($mario->getAllProperties());

//$luigi = (new Director())->build(new LuigiBuilder());
$luigi = $director->build(new LuigiBuilder());
print_r($luigi->getAllProperties());
?>