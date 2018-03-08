<?php

require_once __DIR__.('\Storage.php');
require_once __DIR__.('\..\..\models\Entity\Member.php');

class StorageMysql extends Storage
{
    protected $type = 'mysql';

    function __construct()
    {
        $config = parse_ini_file(realpath('application/core/config.ini'));
        try {
            $this->connection = new PDO($this->type . ":host=" . $config['mysqlHost'] . ";port=" . $config['mysqlPort'] . ";dbname=" . $config['mysqlDb'], $config['mysqlUser'], $config['mysqlPassword']);
            $this->connection->errorInfo();
        } catch (PDOException $e) {
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

                foreach ($arrayValue as $listKey => $listValue) {
                    if (!is_array($listValue)) {
                        $field .= "`" . trim(strtolower($listKey)) . "`, ";
                        if (!empty(trim($listValue))) {
                            $value .= "'" . trim(strtolower($listValue)) . "', ";
                        } else {
                            $value .= "'NULL', ";
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
    public function getMember($mail)
    {

            $query = $this->connection->prepare("SELECT mail from tbl_member where mail = :mail");
            $query->bindValue(':mail',$mail,PDO::PARAM_STR);
            if(!($query->execute())) return 0;else
                return $query->fetchAll();
    }
    public function getMemberId($login,$password)
    {

        $query = $this->connection->prepare("SELECT * from tbl_member where login = :login and password = :password");
        $query->bindValue(':login',$login,PDO::PARAM_STR);
        $query->bindValue(':password',$password,PDO::PARAM_STR);
        if(!($query->execute())) return 0;else
            return $query->fetchAll();
    }





    public function add(Member $member)
    {

        try {
                $query = $this->connection->prepare("INSERT INTO tbl_member (mail,login,teamleader,idTeam,password)  VALUES (:mail,:login,:teamleader,:idTeam,:password)");
                $query->bindValue(':mail',$member->getMail(),PDO::PARAM_STR);
                $query->bindValue(':login',$member->getLogin(),PDO::PARAM_STR);
                $query->bindValue(':teamleader',false,PDO::PARAM_BOOL);
                $query->bindValue(':idTeam',1,PDO::PARAM_INT);
                $query->bindValue(':password',$member->getPassword(),PDO::PARAM_STR);
                $query->execute();
            } catch (PDOException $e)
                {
                    echo "Error !: " . $e->getMessage() . PHP_EOL;
                }
    }


    public function read(array $data)
    {
        $sql = "";
        foreach ($data as $table => $array) {

            foreach ($array as $arrayValue) {
                $value = "";

                foreach ($arrayValue as $listKey => $listValue) {
                    if (!empty(trim($listValue))) {
                        $value .= trim(strtolower($listKey)) . " = '" . trim(strtolower($listValue)) . "' AND ";
                    }
                }
                $value = trim($value, "AND ");

                $sql .= "SELECT * FROM tbl_" . $table . " WHERE " . $value . ";";

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

                    foreach ($typeValue as $listKey => $listValue) {
                        $value[trim($typeKey)] .= "`" . trim(strtolower($listKey)) . "` = '" . trim(strtolower($listValue)) . "', ";
                    }

                    $value[trim($typeKey)] = trim($value[trim($typeKey)], ", ");

                }

                $sql .= "
                UPDATE tbl_" . $table . " SET " . $value['set'] . " WHERE " . $value['get'] . ";";

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
                $field = "";
                $value = "";

                foreach ($arrayValue as $listKey => $listValue) {
                    $value .= trim(strtolower($listKey)) . " = '" . trim(strtolower($listValue)) . "' AND ";
                }
                $value = trim($value, "AND ");

                $sql .= "DELETE FROM tbl_" . $table . " WHERE " . $value;

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
            $data = $request->fetchAll();
            return $data;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
        }
    }

}