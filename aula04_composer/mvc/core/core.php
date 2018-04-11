<?php

// Aula 3
class core
{   
    public function run()
    {
//        Busca tudo o que foi digitado apos "index.php"
//        $url = substr($_SERVER['PHP_SELF'], (strpos($_SERVER['PHP_SELF'],"index.php") + strlen("index.php")));
//        
        // AULA 9 - Nem sempre o servidor possui "$_SERVER['PHP_SELF']" habilitado...
        //$url = "/".((isset($_GET['q'])) ? $_GET['q'] : "");
        
        // Aula 5 - Consertando a coleta do Controller e Action + Parametros
        $url = end(explode("index.php",$_SERVER['PHP_SELF']));
        $params = array();
        
        if (!empty($url)) {
            $url = explode("/",$url);
            // Exclui o primeiro registro, que eh vazio
            array_shift($url);
            
            $currentController = $url[0]."Controller";
            array_shift($url);
            
            // Evita erro quando URL finaliza com "/"
            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = "index";
            }
            
            // Aula 5 - Pegando parametros da URL
            if (count($url) > 0) {
                $params = $url;
            }
            
        } else {
            $currentController = "homeController";
            $currentAction = "index";
        }
        
        // Aula 04 - Chama o Controller e a Action
        require_once "core/controller.php";
        
        $c = new $currentController();
//        Aula 05 - Pegando parametros da URL
//        $c->$currentAction();
        call_user_func_array(array($c, $currentAction), $params);
        
    }
}
