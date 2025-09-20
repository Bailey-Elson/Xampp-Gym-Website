<?php
require_once 'db_config.php'; 
require_once 'db_util.php';

class Exercise {

    public $exerciseDetails = array();

    public function __construct() {
        $this->exerciseDetails['id']=0;
        $this->exerciseDetails['name']='';
        $this->exerciseDetails['exercisetypeid'] = 0;
        $this->exerciseDetails['note'] = '';
    }

    public static function create($params=null){
        $instance = new self();
        if(isset($params)){
            if(isset($params['id'])){$instance->exerciseDetails['id']=$params['id'];}
            if(isset($params['name'])){$instance->exerciseDetails['name']=$params['name'];}
            if(isset($params['exercisetypeid'])){$instance->exerciseDetails['exercisetypeid']=$params['exercisetypeid'];}
            if(isset($params['note'])){$instance->exerciseDetails['note']=$params['note'];}
        }
        return $instance;
    }

    function setid($id) {
        $this->exerciseDetails['id'] = $id;
    }
    function getid(){
        return $this->exerciseDetails['id'];
    }


    function setname($name) {
        $this->exerciseDetails['name'] = $name;
    }
    function getname(){
        return $this->exerciseDetails['name'];
    }


    function setexercisetypeid($exercisetypeid) {
        $this->exerciseDetails['exercisetypeid'] = $exercisetypeid;
    }
    function getexercisetypeid(){
        return $this->exerciseDetails['exercisetypeid'];
    }


    function setnote($note) {
        $this->exerciseDetails['note'] = $note;
    }
    function getnote(){
        return $this->exerciseDetails['note'];
    }
}
interface ExerciseProvider {
    public function getExercises();
}
class DBExerciseProvider implements ExerciseProvider {
    public function getExercises() {
        $mysql = "SELECT * FROM exercise;";
        $exercises = $this->readExercises($mysql);
        error_log(print_r($exercises, true));

        return $exercises;
    }
    private function readExercises($mysql) {
        $exercises = array();
        $con = DatabaseConnection::getInstance()->getConnection();

        $results = $con->query($mysql); 

        if ($results === false) {
            throw new DBAccessException($con->error, $mysql, get_class($this), "Error Reading Exercise Record");
        }

        while ($row = $results->fetch_assoc()) {
            $exercise = Exercise::create($row);
            $exercises[] = $exercise;
        }

        return $exercises;
    }
}
class ExerciseProviderFactory {
    public static function createProvider($type){
        if($type=="db"){
            return new DBExerciseProvider;
        } else {
            return null;
        }
    }
}