<?php

/**
 * Class SQL
 * Используется для работы с базой данных.
 */
class SQL{
    private static $instance;
    private $db;

    public static function Instance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        setlocale(LC_ALL, 'ru_RU.UTF8');
        $this->db = new PDO(DB_DRIVER.':host=' .DB_SERVER . ';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        $this->db->exec('SET NAMES UTF8');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * @param $query
     * @return mixed
     * Обрабатывает любой запрос, но он должен быть полностью написан вручную.
     * Используется для сложных запросов (более 1 параметра)
     */
    public function HardQuery($query)
    {
        $q = $this->db->prepare($query);
        $q->execute();

        if($q->errorCode() != PDO::ERR_NONE){
            $info = $q->errorInfo();
            throw new \PDOException($info[2]);
        }

        return $q->fetch();
    }


    /**
     * @param $table
     * @param bool $where_key
     * @param bool $where_value
     * @param bool $getAll
     * @return array|mixed
     * Пример :
     * хотим получить = "select * from table where id = 1"
     * пишем = Select('table', 'id', 1)  // 'название таблицы', '', ''
     */
    public function SelectWithKey($table, $where_key = false, $where_value = false , $getAll = false)
    {

        if ($where_key AND $where_value) {
            $query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = '" . $where_value . "'";
        } else {
            $query = "SELECT * FROM " . $table;
        }

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != \PDO::ERR_NONE) {
            $info = $q->errorInfo();
            throw new \PDOException($info[2]);
        }

        if ($getAll) {
            return $q->fetchAll();
        } else if ($where_key AND $where_value) {
            return $q->fetch();
        } else {
            return $q->fetchAll();
        }
    }



    /**
     * @param $table
     * @param $array
     * @return string
     * Пример 'Insert into table(f1,f2) value(1,2)'
     * Пишем Insert("goods",['title'=>'Товар 1','price'=>100])
     */
    public function Insert($table, $array) {

        $columns = array();

        foreach ($array as $key => $value) {

            $columns[] = $key;
            $masks[] = ":$key";

            if ($value === null) {
                $array[$key] = 'NULL';
            }
        }

        $columns_s = implode(',', $columns);//"'title','price'"
        $masks_s = implode(',', $masks);//"'title','price'"

        $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

        $q = $this->db->prepare($query);
        $q->execute($array);

        if ($q->errorCode() != \PDO::ERR_NONE) {
            $info = $q->errorInfo();
            throw new \PDOException($info[2]);
        }

        return $this->db->lastInsertId();
    }



    /**
     * @param $table
     * @param $array
     * @param $where
     * @return int
     * Пример UPDATE table set count=10,price=1000 where id = 2
     * Пишем Update('table', ['count' => 10,'price'=>1000], 'id = 2')
     */
    public function Update($table, $array, $where) {

        $sets = array();

        foreach ($array as $key => $value) {

            $sets[] = "$key=:$key";

            if ($value === NULL) {
                $array[$key]='NULL';
            }
        }

        $sets_s = implode(',',$sets);
        $query = "UPDATE $table SET $sets_s WHERE $where";

        $q = $this->db->prepare($query);
        $q->execute($array);

        if ($q->errorCode() != \PDO::ERR_NONE) {
            $info = $q->errorInfo();
            throw new \PDOException($info[2]);
        }

        return $q->rowCount();
    }



    /**
     * @param $table
     * @param $where
     * @return int
     * Пример Delete('table', 'id = 2')
     */
    public function Delete($table, $where) {

        $query = "DELETE FROM $table WHERE $where";
        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != \PDO::ERR_NONE) {
            $info = $q->errorInfo();
            throw new \PDOException($info[2]);
        }

        return $q->rowCount();
    }

    public function Password ($name, $password) {

        return strrev(md5($name)) . md5($password);
    }

    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}
}