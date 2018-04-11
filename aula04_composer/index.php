<?php
/**
 * Composer: repositorio/resolutor de dependencias das classes criadas por usuarios
 * Exemplo: Instalar o Monolog numa estrutura MVC basica
 * 
 * Sites:
 *  https://packagist.org -- Repositorio e dependencias
 *  https://getcomposer.org -- Para baixar o composer.phar
 * 
 * Passo 1: Baixar o composer.phar do site getcomposer
 * Passo 2: Windows: Abrir o CMD, ir até as pastas do projeto atual e copiar ali o composer.phar 
 *  Ex: C:\xampp\htdocs\curso_php\modulo7_2_jedi\aula04_composer
 * Passo 3: criar o arquivo composer.json
 * Passo 4: baixar o monolog. No windows: > php composer.phar install
 *   Cria:
 *      composer.lock (p/monitorar atualizações: > php composer.phar update)
 *      pasta vendor/ e também autoload.php
 * Passo 5: fazer require 'vendor/autoload.php' no index.php do MVC
 * Passo 6: usando o autoload
 */