
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddUsers</title>
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
        <h2>Add User</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="fname">Father's Name</label>
        <input type="text" name="fname" id="fname" required>
        <label for="name">Address</label>
        <input type="text" name="address" id="address" required>
        <input type="hidden" name="act" value="insert">
        <div>
            <input type="submit" value='Submit' class="btn" >;
            
        </div>
    </form>
    </div>
</body>
</html>