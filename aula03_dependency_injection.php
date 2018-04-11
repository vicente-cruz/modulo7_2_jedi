<?php
/**
 * Para manutencao de objetos
 */


/**
 *  Sem dependency injection.
 *  Problema: Quando tiver que criar outros videos: Wistia, xyz...
 *  Solucao: Ja envia o objeto pronto p/classe.
 */

interface VideoServiceInterface {
    public function getEMBED();
}
class Youtube implements VideoServiceInterface
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED()
    {
        return '<iframe>'.$this->url.'</iframe>';
    }
}

class Vimeo implements VideoServiceInterface
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED()
    {
        return '<video>'.$this->url.'</video>';
    }    
}

class Wistia implements VideoServiceInterface
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    /**
     *  Mudou, não é getEMBED
     *  Solucao: cria interface
     */
    public function getEMBED()
    {
        return '<algo>'.$this->url.'</algo>';
    }    
}

class Xyz implements VideoServiceInterface
{
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function getEMBED()
    {
        return '<xyz>'.$this->url.'</xyz>';
    }    
}

class Aula
{
    private $video;
  
    // SEM INJECAO DE DEPENDENCIA
//    public function __construct($video_type, $url)
//    {
//         switch ($video_type) {
//             case 'youtube':
//                 $video = new Youtube($url);
//                 break;
//             case 'vimeo':
//                 $video = new Vimeo($url);
//                 break;
//         }
//    }
    // COM INJECAO: ja passa o objeto pronto, independente de ser youtube, vimeo...
    public function __construct(VideoServiceInterface $video)
    {
        $this->video = $video;
    }
    
    public function getVideoHtml()
    {
        return $this->video->getEMBED();
    }
}

$aula = new Aula(new Xyz('www.youtube.com...'));

echo "HTML: ".$aula->getVideoHtml();
?>