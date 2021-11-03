<?php include_once("config/config.php");  ?>
<?php include_once("config/database.php");  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <style>
        table{
            width: 400px;
            margin: auto;
        }
        td{
            padding: 3px 7px;
            text-align: center;
        }
        tr:first-child{
            font-size: 24px;
            font-weight: 500;
            background-color: #4bbf6a;
            color: #fff;
        }
        .create{
            width: 150px;
            display: block;
            margin: auto;
            margin-top: 40px;
            border: 1px solid gray;
            text-decoration: none;
            padding: 3px 7px;
            text-align: center;
            border-radius: 3px;
            transition: 0.4s;
        }
        .create:hover{
            background-color: #4bbf6a;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_GET['delstatus'])){
        ?>
        <p class="delstatus"><?php echo $_GET['delstatus']; ?></p>
        <?php
    }
    ?>
    <table border="1" style="border-collapse: collapse; ">
        <tr>
            <td>ID</td>
            <td>USER NAME</td>
            <td>Action</td>
        </tr>
        <?php
        $db = new database($cleardb_server,$cleardb_username,$cleardb_password,$cleardb_db);
        $query = "SELECT * FROM test_table";
        $read = $db->select($query);
        if($read){
            while($row = $read ->fetch_assoc()){
                ?>
                
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['user'];  ?></td>
                    <td><a href="update.php?editid=<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" style="font-size:20px"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete.php?delid=<?php echo $row['id']; ?>" title="Sure?" onclick="return confirm('Sure Delete the Item?');"><i class="fa fa-remove" style="font-size:20px;color:red"></i></a></td>
                </tr>
                
                <?php
            }

        }
        else{
            echo "<h3>Data Not Found</h3>";
        }
        ?>
    </table>
    <a href="create.php" class="create">Create User</a>
    <?php 
    if(isset($_GET['msg'])){?>
    <h4 id="update-msg"><?php echo $_GET['msg']; ?></h4>
    <?php
    }
    ?>


<script>
    $(document).raedy(function(){
        setTimeout(function(){
            $("#update-msg").remove();
        }, 2000);
    });
</script>
</body>
</html>