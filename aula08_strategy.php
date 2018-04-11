<?php
// Para diferentes "tipos de retorno" de um webservice por exemplo.
interface OutputInterface
{
    public function load($data);
}

// Estrategia de retorno 1
class JsonOutput implements OutputInterface
{
    public function load($data)
    {
        return json_encode($data);
    }
}

// Estrategia de retorno 2
class ArrayOutput implements OutputInterface
{
    public function load($data)
    {
        return $data;
    }
}

class Produtos
{
    private $lista;
    private $output;
    
    public function getLista()
    {
        // ... Dados buscado do BD por exemplo
        $this->lista = array(
            array("id" => 1, "nome" => "vicente"),
            array("id" => 2, "nome" => "fulano")
        );
    }
    
    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }
    
    public function getOutput()
    {
        return $this->output->load($this->lista);
    }
}


$produtos = new Produtos();
$produtos->getLista();

$produtos->setOutput(new ArrayOutput());
////$produtos->setOutput(new ArrayOutput());
//
$data = $produtos->getOutput();
print_r($data);
?>