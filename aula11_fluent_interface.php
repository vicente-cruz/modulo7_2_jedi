<?php
// Deixar o codigo legivel, user friendly. Uso de encadeamento de metodos
class Person
{
    private $name;
    private $lastname;
    private $idade;
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }
    
    public function setIdade($idade) {
        $this->idade = $idade;
        return $this;
    }

        
    public function getFullName()
    {
        return $this->name.' '.$this->lastname.' = '.$this->idade.' anos';
    }
}

$person = new Person();
$person->setName('Vicente')->setLastname('Silva Cruz')->setIdade(35);

echo "Pessoa: ".$person->getFullName();
?>