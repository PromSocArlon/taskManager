<?php
namespace app\core;
/**
 * Handle any error.
 * @param \Exception $exception the error that must be handled
 */
function handleError(\Exception $exception)
{
    $isDevMode = true;
    if ($isDevMode) {
        $view = new View('error');
        $trace = traceToTable($exception->getTrace());
        $arrErr = array(
            'msgError' => htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8', false),
            'stackTrace' => $trace
        );
        $view->generate($arrErr);
    } else {
        //TODO Not working properly, to finish
        $view = new View('error404');
        $view->generate(null);
    }

}

function traceToTable(array $trace)
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