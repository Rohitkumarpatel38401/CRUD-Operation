<?php
    include("db_model.php");
    $obj=new Database();
    $res=null;
    if(isset($_REQUEST['id'])){
        $res=$obj->select("SELECT * FROM users where u_id=".$_REQUEST['id']);
        $res=mysqli_fetch_assoc($res);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Users</title>
   <link rel="stylesheet" href="style.css" />
   <style>
       input[type="submit"]{
           background:green;
           padding:7px 20px;
           cursor: pointer;
       }
       h2{
           color:blue;
           text-align:center;
       }
   </style>
</head>
<body>
    <div class="container">
    <form action="controller.php">
        <h2>Update User</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?=$res['u_name']?>" required >
        <label for="fname">Father's Name</label>
        <input type="text" name="fname" id="fname" value="<?=$res['u_fname']?>" required >
        <label for="name">Address</label>
        <input type="text" name="address" id="address" value="<?=$res['u_address']?>" required >
        
        <input type="hidden" name="act" value="update">
        <input type="hidden" name="id" value="<?=$res['u_id']?>">
        <div>
            <input type="submit" value='Update' class="btn" >;
            
        </div>
    </form>
    </div>
</body>
</html>