<?php
setlocale(LC_ALL,'en_GB.UTF-8');
class DBAccessException extends Exception {
    protected $sqlerrors;
    protected $sql;
    protected $class;

    public function __construct($sqlerrors,$sql,$class,$message,$code = 0,Exception $previous = null){
        $this->sql = $sql;
        $this->sqlerrors = $sqlerrors;
        $this->class = $class;
        parent::__construct($message, $code, $previous);
    }
    
    public function getSQLErrors() {
        return $this->sqlerrors;
    }
    public function getSQL() {
        return $this->sql;
    }
    public function getClass() {
        return $this->class;
    }

}