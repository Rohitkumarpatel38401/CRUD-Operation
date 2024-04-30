<?php
    include("db_model.php");
    $obj=new Database();
    if(isset($_REQUEST['msg'])){
        echo "<script> alert('".$_REQUEST['msg']."') </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>

   <link rel="stylesheet" href="style.css" />
   <style>
     
   </style>

</head>
<body>
    <div class="container">
        <h2>All Users Records</h2>
        <a href="addUser.php" class="btn" style="align-self:end;margin-right:10%;background:green">Add User</a>
        <table>
            <tr class="headTitle">
                <th>Name</th>
                <th>Father Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
               
                $res=$obj->select("SELECT * FROM users");
                if($res->num_rows > 0){
                    while($row=mysqli_fetch_assoc($res)){
             
                ?>

                <tr>
                    <td><?=$row['u_name']?></td>
                    <td><?=$row['u_fname']?></td>
                    <td><?=$row['u_address']?></td>
                    <td>
                        <a href="controller.php?act=delete&&id=<?=$row['u_id']?>" class="btn" style="background-color:red">Delete</a>
                        <a href="update.php?id=<?=$row['u_id']?>" class="btn">Edit</a>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
            
        </table>

    </div>
</body>
</html>