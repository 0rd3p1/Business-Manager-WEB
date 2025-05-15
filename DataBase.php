<?php

class DataBase {
    private $database;

    public function __construct($dbConfig) {   
        $this->database = new PDO($this->getDns($dbConfig));
    }

    private function getDns($dbConfig) {
        $driver = $dbConfig['driver'];
        unset($dbConfig['driver']);

        $dsn = $driver . ':' . http_build_query($dbConfig, '', ';');

        if($driver == 'sqlite'){
            $dsn = $driver . ':' . $dbConfig['dbName'];                                                                                                                                                                                       
        }

        return $dsn;
    }

    public function query($query, $class = null, $params = []){
        $prepare = $this->database->prepare($query);

        if($class){
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        
        $prepare->execute($params);
        return $prepare;
    }
}

$db = new DataBase($dbConfig['database']);

?>