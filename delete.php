<?php include_once("config/config.php");  ?>
<?php include_once("config/database.php");  ?>
<?php 
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $db = new database($cleardb_server,$cleardb_username,$cleardb_password,$cleardb_db);
    $query = "DELETE FROM test_table WHERE id=$id";
    $result = $db->delete($query);
    $message = "";
    if($result == true){
        $message = "User Deleted Succesfully";
    }else{
        $message = "Delete fail";
    }
    header("location: index.php?delstatus=$message");
}

