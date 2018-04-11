<?php
require "config.php";
require "vendor/autoload.php";

define("BASE_URL", "http://curso_php.pc/modulo7_1_superavancado/aula22_mvc_estrutura_comum/");  

spl_autoload_register(function ($class) {
    // Verifica se as classes sao Controller e se os arquivos existem de fato
    // OBS: Só classes controller possuem o padrao de nomeacao <nome>Controller
    if (strpos($class,"Controller") > -1) {
        if (file_exists("controllers/".$class.".php")) {
            require_once "controllers/".$class.".php";
        }
    } else if (file_exists("models/".$class.".php")) {
        require_once "models/".$class.".php";
    } else {
        require_once "core/".$class.".php";
    }
});

$log = new Monolog\Logger("teste");
$log->pushHandler(new Monolog\Handler\StreamHandler("erros.log",Monolog\Logger::WARNING));

$log->addError("Aviso! Deu problema");

$core = new core();
$core->run();