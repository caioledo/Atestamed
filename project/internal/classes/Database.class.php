<?php

class Database {

    private $MYSQL_SERVER = '127.0.0.1';
    private $MYSQL_PORT = 3306;
    private $MYSQL_USERNAME = 'root';
    private $MYSQL_PASSWORD = 'root';
    private $MYSQL_DATABASE = 'atestamed';

    /**
     * 
     * @return mysqli
     */
    public function getConnection() {
        $conn = new mysqli($this->MYSQL_SERVER, $this->MYSQL_USERNAME, $this->MYSQL_PASSWORD, $this->MYSQL_DATABASE, $this->MYSQL_PORT);
        if (!$conn->connect_error) {
            return $conn;
        }
        return null;
    }

}
