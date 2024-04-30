<?php
class Database{
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="vertrigo";
    private $db_name="crud";

    private $mysqli="";
    private $result=array();
    private $con=false;
    public function __construct(){
        if(!$this->con){
            $this->mysqli=new Mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }else{
                $con=true;
                return true;
            }
        }
    }
    //----------------Insert function--------------
    public function insert( $table,$params = array() ){
        if($this->tableExist($table) ){
            $dataKeys=implode(',',array_keys($params));
            $dataValues=implode("','",array_values($params));
            $sql="INSERT INTO $table ($dataKeys) VALUES('$dataValues')";
            $this->mysqli->query($sql);
            array_push($this->result,'Id'.$this->mysqli->insert_id." is Inserted in ".$table);
            return true;
        }
        else{
            return false;
        }
    }
   //----------------- Update Function----------------
    public function update($table,$params=array(),$where=null){
        if($this->tableExist($table)){
            $args=array();
            foreach($params as $key=>$value){
                array_push($args,"$key='$value'");
            }
            $sql="UPDATE $table SET ".implode(', ',$args);
            if($where!=null){
                $sql=$sql." WHERE $where";
            }
            if( $this->mysqli->query($sql) ){
                array_push($this->result,$this->mysqli->affected_rows.' Record Updated Success');
                return true;
            }else{
                array_push($this->result,$this->mysqli->error());
                return false;
            }
        }else{
            return false;
        }
    }
    //----------------- Delete Function ----------------------
    public function delete($table,$where=null){
        if($this->tableExist($table)){
            $sql="DELETE FROM $table";
            if($where!=null){
                $sql.=" WHERE $where";
            }
            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->affected_rows." row deleted !");
                return true;
            }
        }else{
            return false;
        }
    }

    //----------------- Select Function -----------------------
    public function select($sql){
        $res=$this->mysqli->query($sql);
        if($res->num_rows > 0){
           return $res;
        }
    
    }

    //--------------- check table exists or not in DB---------
    private function tableExist($table){
        $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows==1){
                return true;
            }else{
                array_push($this->result,$table." Does not exist in this Database");
                return false;
            }
        }
    }

    //---------------------------------------------------
    public function getResult(){
        return $this->result;
    }

    //------------------To close connection----------------------
    public function __destruct(){
        if($this->con){
           if( $this->mysqli->close() ){
               $con=false;
               return true;
           }
        }else{
            return false;
        }
    }
}

?>