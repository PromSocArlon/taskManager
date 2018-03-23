<?php
namespace app\core;

class View {
    private $file;
    private $title;

    public function __construct($action, $controller = "")
    {
        $file = "application/views/";
        if ($controller != "") {
            $file = $file . $this->getControllerName($controller) . "/";
        }
        $this->file = $file . $action . ".php";
    }


    /**
     * Generate the wanted view
     * @param array $data the data to add to the generation
     */
    public function generate(array $data): void
    {
        try {
            $content = $this->generateFile($this->file, $data);
            $root = "taskManager";
            $view = $this->generateFile('application/views/template.php', array('title' => $this->title, 'content' => $content, 'root' => $root));
            echo $view;
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }

    /**
     * @param string $filePath the path of the file to base the generation on.
     * @param array $data the data to add to the generation
     * @return string the generated file
     * @throws \Exception if the file is not found.
     */
    private function generateFile(string $filePath, array $data): string
    {
        if (file_exists($filePath)) {
            extract($data);
            ob_start();
            require($filePath);
            return ob_get_clean();
        } else {
            throw new \Exception("File '$filePath' not found");
        }
    }

    public function getControllerName($fullControllerName){
        $temp = explode('\\', $fullControllerName);
        return end($temp);
    }


}