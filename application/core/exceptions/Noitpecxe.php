<?php
namespace app\core\exceptions;

use Throwable;

class Noitpecxe extends \Exception
{
    protected $message = 'exception inconnue'; // Message de l'exception.
    protected $code = 0; // Code de l'exception défini par l'utilisateur.
    protected $file; // Nom du fichier source de l'exception.
    protected $line; // Ligne de la source de l'exception.

    // Redéfinissez l'exception ainsi le message n'est pas facultatif
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    // chaîne personnalisée représentant l'objet
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "Une fonction personnalisée pour ce type d'exception\n";
    }

}

