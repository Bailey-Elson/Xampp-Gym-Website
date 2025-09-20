<?php
include 'dblib/db_config.php'; 

class Exercise {

    public $exerciseDetails = array();

    public function __construct() {
        $this->exerciseDetails['id']=0;
        $this->exerciseDetails['name']='';
        $this->exerciseDetails['exercisetypeid'] = 0;
        $this->exerciseDetails['note'] = '';
    }

    function setid($id) {
        $this->id = $id;
    }
    function getid(){
        return $this->exerciseDetails['id'];
    }


    function setname($name) {
        $this->name = $name;
    }
    function getname(){
        return $this->exerciseDetails['name'];
    }


    function setexercisetypeid($exercisetypeid) {
        $this->exercisetypeid = $exercisetypeid;
    }
    function getexercisetypeid(){
        return $this->exerciseDetails['exercisetypeid'];
    }


    function setnote($note) {
        $this->note = $note;
    }
    function getnote(){
        return $this->exerciseDetails['note'];
    }
}
function getExercises() {
    $mysql = "SELECT * FROM exercise;";
    $result = $conn->query($sql);

    error_log(print_r($result, true));

    return $result;
}