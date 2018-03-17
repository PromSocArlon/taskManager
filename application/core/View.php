<?php

class View
{
    private $file;
    private $title;

    public function __construct($action, $controller = "")
    {
        $file = "application/views/";
        if ($controller != "") {
            $file = $file . $controller . "/";
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
        } catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    /**
     * @param string $filePath the path of the file to base the generation on.
     * @param array $data the data to add to the generation
     * @return string the generated file
     * @throws Exception if the file is not found.
     */
    private function generateFile(string $filePath, array $data): string
    {
        if (file_exists($filePath)) {
            extract($data);
            ob_start();
            require($filePath);
            return ob_get_clean();
        } else {
            throw new Exception("File '$filePath' not found");
        }
    }

    /**
     * Handle any error.
     * @param Exception $exception the error that must be handled
     */
    public function handleError(Exception $exception): void
    {
        $view = new View('error');
        $trace = $this->traceToTable($exception->getTrace());
        $arrErr = array(
            'msgError' => htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8', false),
            'stackTrace' => $trace
        );
        $view->generate($arrErr);
    }

    private function traceToTable(array $trace)
    {
        $rows = array();
        foreach ($trace as $row) {
            $cells = array();
            foreach ($row as $cell) {
                if (!is_array($cell)) {
                    $cells[] = "<td>{$cell}</td>";
                }
            }
            $rows[] = "<tr>" . implode('', $cells) . "</tr>";
        }
        return "<table class='hci-table'>" . implode('', $rows) . "</table>";
    }
}