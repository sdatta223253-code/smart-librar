<?php
include "db.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $sql="insert into users (name,email,password,role)
          values('$name','$email','$password','$role')";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo "error!";
    }else{
       // echo "u have registered succesfully";
        header("Location:/LIBRARY/login.php");
         exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Library System</title>
    <?php include "heading.php"; ?>
</head>
<body style="background: linear-gradient(135deg,#4facfe,#00f2fe); font-family: Arial, sans-serif;">

<div class="register" style="
    background:#fff; 
    width:350px; 
    padding:30px; 
    border-radius:15px; 
    margin:60px auto; 
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
    text-align:center;
">
    <h2 style="margin-bottom:20px; color:#333;">Sign Up</h2>
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Enter your name" required style="width:80%; padding:10px; margin:8px 0; border-radius:8px; border:1px solid #ccc;"><br>
        <input type="email" name="email" placeholder="Enter your email" required style="width:80%; padding:10px; margin:8px 0; border-radius:8px; border:1px solid #ccc;"><br>
        <input type="password" name="password" placeholder="Enter your password" required style="width:80%; padding:10px; margin:8px 0; border-radius:8px; border:1px solid #ccc;"><br>
        <input type="text" value="user" name="role" hidden><br>
        <button type="submit" style="
            padding:10px 25px; 
            background:#28a745; 
            color:white; 
            border:none; 
            border-radius:25px; 
            font-weight:bold; 
            cursor:pointer;
            margin-top:10px;
            transition:0.3s;
        " onmouseover="this.style.background='#218838'" onmouseout="this.style.background='#28a745'">Sign Up</button>
    </form>
    <p style="margin-top:15px;">Already have an account? <a href="login.php" style="color:#4facfe;">Log in</a></p>
</div>

</body>
</html>

