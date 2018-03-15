<?php
namespace app\core\Storage;
class StorageMysql extends Storage

{
    protected $type = 'mysql';

    function __construct()
    {
        $config = parse_ini_file( 'application/core/config.ini');
        try {
            $this->connection = new \PDO($this->type . ":host=" . $config['mysqlHost'] . ";port=" . $config['mysqlPort'] . ";dbname=" . $config['mysqlDb'],
                $config['mysqlUser'], $config['mysqlPassword']);
            $this->connection->errorInfo();
        } catch (\PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            die();
        }
    }

    function __destruct()
    {
        $connection = null;
    }

    public function create(array $data)
    {
        $sql = "";
        foreach ($data as $table => $array) {

            foreach ($array as $arrayValue) {
                $field = "";
                $value = "";

                foreach ($arrayValue['new'] as $listKey => $listValue) {
                    if (!is_array($listValue)) {
                        $field .= "`" . trim(strtolower($listKey)) . "`, ";
                        if (!empty(trim($listValue))) {
                            $value .= "'" . trim(strtolower($listValue)) . "', ";
                        } else {
                            $value .= "NULL, ";
                        }
                    } else {
                        //TODO: ajout gestion tableau status & subtask
                    }

                }
                $field = trim($field, ", ");
                $value = trim($value, ", ");

                $sql .= "INSERT INTO tbl_" . $table . " (" . $field . ") VALUES (" . $value . ");";

            }

        }

        $request = $this->query($sql);

        if ($request->errorInfo()[0] != "00000") {
            var_dump($request->errorInfo());
            return false;
        }

        return true;
    }

    public function read(array $data)
    {
        $sql = "";

        foreach ($data as $table => $array) {

            if (!empty($array)) {

                foreach ($array as $arrayValue) {
                    $value = "";

                    foreach ($arrayValue['new'] as $listKey => $listValue) {
                        if (!is_array($listValue)) {
                            if (!empty(trim($listValue))) {
                                $value .= trim(strtolower($listKey)) . " = '" . trim(strtolower($listValue)) . "' AND ";
                            }
                        } else {
                            //TODO: ajout gestion tableau status & subtask
                        }
                    }
                    $value = trim($value, "AND ");

                    $sql .= "SELECT * FROM tbl_" . $table . " WHERE " . $value . ";";

                }

            } else {
                $sql .= "SELECT * FROM tbl_" . $table . ";";
            }

        }

        $request = $this->query($sql);

        if ($request->errorInfo()[0] != "00000") {
            var_dump($request->errorInfo());
            return false;
        }

        return $request->fetchAll();
    }

    public function update(array $data)
    {
        $sql = "";

        foreach ($data as $table => $array) {

            foreach ($array as $arrayValue) {

                foreach ($arrayValue as $typeKey => $typeValue) {
                    $value[trim($typeKey)] = "";

                    if (trim($typeKey) == "new") {

                        foreach ($typeValue as $listKey => $listValue) {
                            if (!is_array($listValue)) {
                                if (!empty(trim($listValue))) {
                                    $value[trim($typeKey)] .= "`" . trim(strtolower($listKey)) . "` = '" . trim(strtolower($listValue)) . "', ";
                                }
                            } else {
                                //TODO: ajout gestion tableau status & subtask
                            }
                        }
                        $value[trim($typeKey)] = trim($value[trim($typeKey)], ", ");

                    } else {

                        foreach ($typeValue as $listKey => $listValue) {
                            if (!is_array($listValue)) {
                                if (!empty(trim($listValue))) {
                                    $value[trim($typeKey)] .= "`" . trim(strtolower($listKey)) . "` = '" . trim(strtolower($listValue)) . "' and ";
                                }
                            } else {
                                //TODO: ajout gestion tableau status & subtask
                            }
                        }
                        $value[trim($typeKey)] = trim($value[trim($typeKey)], " and ");

                    }

                }

                $sql .= "UPDATE tbl_" . $table . " SET " . $value['new'] . " WHERE " . $value['old'] . ";";

            }

        }

        $request = $this->query($sql);

        if ($request->errorInfo()[0] != "00000") {
            var_dump($request->errorInfo());
            return false;
        }

        return true;
    }

    public function delete(array $data)
    {
        $sql = "";

        foreach ($data as $table => $array) {

            foreach ($array as $arrayValue) {
                $value = "";

                foreach ($arrayValue['new'] as $listKey => $listValue) {

                    // si la valeur n'est pas un tableau
                    if (!is_array($listValue)) {

                        // si la valeur n'est pas vide , on l'ajoute à $value
                        if (!empty($listValue)) {
                            $value .= trim(strtolower($listKey)) . " = '" . trim(strtolower($listValue)) . "' AND ";
                        }
                    } else {
                        //TODO: ajout gestion tableau status & subtask
                    }
                }
                $value = trim($value, "AND ");

                $sql .= "DELETE FROM tbl_" . $table . " WHERE " . $value . ";";

            }

        }

        $request = $this->query($sql);

        if ($request->errorInfo()[0] != "00000") {
            var_dump($request->errorInfo());
            return false;
        }

        return true;
    }

    public function query($sql)
    {
        try {
            $request = $this->connection->prepare($sql);
            $request->execute();
            return $request;
        } catch (\PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
        }
    }

}