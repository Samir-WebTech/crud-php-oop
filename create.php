<?php include_once("config/config.php");  ?>
<?php include_once("config/database.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        input:first-child::placeholder{
            text-align: center;
        }
    </style>
</head>
<body>
<?php 
$db = new database();
if(isset($_POST['insert'])){
    $username = $_POST['username'];
    if($username){
        $query = "INSERT INTO test_table (user) VALUES ('$username')";
    $result = $db->insert($query);
    $message = "";
    if($result == true){
        $message = "User Inserted Succesfully";
    }else{
        $message = "User Insertion Failed";
    }
    ?>
    <h4><?php echo $message; ?></h4>
    <h2>Go To <a href="index.php"><i class="fa fa-institution" style="font-size:36px"></i></a></h2>
    <?php

    }
}

?>


<table border="1" style="border-collapse: collapse;width: 400px; margin: auto;">
    <form action="" method="post">
        <tr>
            <td ><input type="text" name="username" placeholder="Enter User Name" style="width: 98%;"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Insert" name="insert" style="width: 100%;text-align: center;"> 
            </td>
        </tr>
    </form>
</table>

</body>
</html>