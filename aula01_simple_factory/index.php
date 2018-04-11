<?php
require 'facebook.php';

$fb = new Facebook();

$post = $fb->createPost();
$post->setAuthor("Vicente");
$post->setMessage("Mensagem teste");

echo "Autor: ".$post->getAuthor()."<br/>";
echo "Mensagem: ".$post->getMessage()."<br/>";
echo "<hr/>";

$post2 = $fb->createPost();
$post2->setAuthor("Fulano");
$post2->setMessage("Mensagem teste 2");

echo "Autor: ".$post2->getAuthor()."<br/>";
echo "Mensagem: ".$post2->getMessage()."<br/>";
?>