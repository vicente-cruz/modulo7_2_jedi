<?php
/**
 * 2º Mostrar pagina inicial homeController::index()
 * 3º Criar o Model da pagina principal
 */
class homeController extends controller
{    
    public function index()
    {
        $dados = array();
        // 3º Criar model Usuarios
        $usuarios = new usuarios();
        $dados['usuarios'] = $usuarios->getUsuarios(10);
        
        $this->loadTemplate('home', $dados);
    }
}
