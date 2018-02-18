<?php

class view {

    private $file;

    private $title;

    public function __construct($action, $controller = "") {
       $file = "application/views/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }
  
    public function generate($data) {
      
        $content = $this->generateFile($this->file, $data);
      
        $root = "taskManager";
        
        $view = $this->generateFile('application/views/template.php',
                array('title' => $this->title, 'content' => $content,
                    'root' => $root));
        echo $view;
    }

    private function generateFile($file, $data) {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception("File '$file' not found");
        }
    }
}