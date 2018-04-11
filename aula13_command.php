<?php
/**
 * Objeto encapsula lista de acoes de outro objeto.
 * ex: Luz, acoes liga e desliga
 */

class Luz
{
    private $status;
    
    public function ligar()
    {
        $this->status = 'on';
    }

    public function desligar()
    {
        $this->status = 'off';
    }
    
    public function getStatus() {
        return $this->status;
    }
}

class LuzOnCommand
{
    private $luz;
    
    public function __construct(Luz $luz) {
        $this->luz = $luz;
    }

    public function execute()
    {
        $this->luz->ligar();
    }
}

class LuzOffCommand
{
    private $luz;
    
    public function __construct(Luz $luz) {
        $this->luz = $luz;
    }

    public function execute()
    {
        $this->luz->desligar();
    }
}

function callCommand($command)
{
    $command->execute();
}

$luz = new Luz();

$command = new LuzOffCommand($luz);
callCommand($command);


echo "LUZ:".$luz->getStatus();
?>