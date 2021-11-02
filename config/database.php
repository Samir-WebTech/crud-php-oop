<?php
    include_once('config.php');
    class  database{
       public $host =  DB_HOST;
       public $user =  DB_USER;
       public $pass =  DB_PASS;
       public $dbname =  DB_NAME;


       public $link;
       public $error;
       public function __construct(){
           $this->connection();
       }
       private function connection(){
           $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
           if(!$this->link)
           {
               $this->error = "Connection Failed".$this->link->connect_error();
               exit();
           }
       }
       // Select for read or get data
       public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
       }
       public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            return true;
        }else{
            return false;
        }
       }

       public function insert($query){
           $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

           if($insert_row){
            return true;
        }else{
            return false;
        }
       }
       public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

        if($delete_row){
         return true;
     }else{
         return false;
     }
       }


    }
?>