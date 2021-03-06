<?php

class View 
{   
    private $file;
    private $title;
    
    public function __construct($action) 
    {
        $this->file = 'View/' . $action . 'View.php';
    }
    
    public function generate($datas) 
    {
        $content = $this->fileGenerate($this->file, $datas);
        if(stristr($this->file, 'Admin') === FALSE) {
        $view = $this->fileGenerate('View/Layout.php',
            array('title' => $this->title, 'content' => $content));
        } else {
            $view = $this->fileGenerate('View/AdminLayout.php',
                array('title' => $this->title, 'content' => $content));
        }
        echo $view;        
    }
    
    private function fileGenerate($file, $datas) 
    {
        if (file_exists($file)) {
            extract($datas);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}
