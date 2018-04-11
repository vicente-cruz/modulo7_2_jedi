<?php
/**
 * Observador que é notificado a toda e qualquer modificação
 * Ex: Trocando nome de 'usuario' e notificando
 */

class UsuarioObserver
{
    public function update(Usuario $subject)
    {
        echo date("H:i")." - ALERTA - USUARIO ALTERADO: ".$subject->getName();
        echo "<hr/>";
    }
}

class Usuario
{
    private $name;
    private $observers = array();
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function attach(UsuarioObserver $obs)
    {
        $this->observers[] = $obs;
    }
    
    public function detach(UsuarioObserver $obs)
    {
        foreach ($this->observers as $key => $value) {
            if ($obs == $value) {
                unset($this->observers[$key]);
            }
        }
    }
    
    public function notify() {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        
        $this->notify();
    }
}

$olheiro = new UsuarioObserver();
$usuario = new Usuario("Vicente");
$usuario->attach($olheiro);

echo "Meu nome eh: ".$usuario->getName();
echo "<hr/>";

$usuario->setName("Vicente Silva Cruz");
echo "Meu nome eh: ".$usuario->getName();
echo "<hr/>";

$usuario->detach($olheiro);

$usuario->setName("Fulano");
echo "Meu nome eh: ".$usuario->getName();
echo "<hr/>";
?>