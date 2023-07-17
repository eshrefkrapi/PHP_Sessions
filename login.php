<?php
session_start();
$con=mysqli_connect("localhost","root","","Session");
$msg="";
if(isset($_POST['login'])){
   // echo "<pre>";
   // print_r($_POST);

    $username= mysqli_real_escape_string($con,$_POST['username']);
    $password= mysqli_real_escape_string($con,$_POST['password']);

    $sql= mysqli_query($con, "select * from login where username='$username' && password='$password'");
    $num = mysqli_num_rows($sql);
    if ($num>0) {
        //echo "Found";
        $row=mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_NAME']=$row['username'];

        header("location: index.php");
    }else { 
        $msg="Please enter valid username or password!";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<style type="text/css">  
form {
    box-sizing:border-box;
    width:25em;
    transform:translateX(50%);
    border:dotted red 3px;
    margin-top:6em;
    margin-left:15em;
}
button{
    margin-left:10em ;
    margin-bottom:2em ;
    background-color:lightblue;
}
</style>
<body>

<form action="login.php" method="post">
  <div class="form-group my-5 mr-5 ml-5">
    <label for="username" >Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group my-5 mr-5  ml-5">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>

  <button type="submit" class="btn btn-default" name="login">Log In</button>

  <div class="error">
    <?php echo $msg; ?>
  </div>
</form>
</body>
</html>