<?php
/**
 * 1º - Configurar acesso ao banco
 */

require "environment.php";

global $config;
$config = array();
if (ENVIRONMENT == "development") {
    $config['dbname'] = 'curso_php';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    $config['dbname'] = 'curso_php';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}