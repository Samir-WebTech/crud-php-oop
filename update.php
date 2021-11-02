<?php include_once("config/config.php");  ?>
<?php include_once("config/database.php"); ?>
<?php
if(isset($_POST['update'])){
    $uid = $_POST['userid'];
    $uname = $_POST['username'];
    $db = new database();

    $query = "UPDATE `test_table` 
    SET `user` = '$uname' 
    WHERE `test_table`.`id` = $uid"; 
    $result = $db->update($query);
    $message = "";
    if($result){
        $message = "Data updated Successfully";
    }else{
        $message = "Data updating Failed";
    }
    header("location: index.php?msg=$message");
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <?php 
    if($_GET['editid']){
        $userid = $_GET['editid'];
        $db = new database();
        $query = "SELECT * FROM test_table WHERE id=$userid";
        $read = $db->select($query);
        if($read){?>
        <table border="1" style="border-collapse: collapse;width: 400px;margin: auto;">
        <tr>
            <td>ID</td>
            <td>USER NAME</td>
        </tr>
        <?php
            while($row = $read ->fetch_assoc()){
                ?>
                <form action="" method="post">
                <tr>
                    <td><?php echo $row['id'];  ?>
                        <input type="hidden" value="<?php echo $row['id'];  ?>" name="userid"></td>
                    <td><input type="text" name="username" value="<?php echo $row['user'];  ?>" style="width: 97%;"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Update" name="update"> 
                    </td>
                </tr>
                </form> 
                <?php
            }
        }else{
            echo "<h3>No data Found with the id $userid</h3>";
        }
    }
    ?>
    
</body>
</html>