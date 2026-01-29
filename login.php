<?php
include "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == $password) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            if($row['role']=="admin"){
                 header("Location: /LIBRARY/admin/dashboard.php");
                exit;

            }else{
                header("Location: /LIBRARY/dashboard.php");
                exit;
            }


        } else {
            header("Location: login.php");
            exit;
        }

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "heading.php"; ?>

<body style="background-color:#f2f6ff; color:green;">
  <div style="width:90px; height:90px; border-radius:50%; background:#4facfe; 
            display:flex; align-items:center; justify-content:center; 
            font-size:300px; color:white; margin:0 ;">
    📚
</div>

    <div class="register">
        <!-- <div style="font-weight:bold; margin-top:10px; text-align:center; font-size:18px;">
    User Login page
</div> -->
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="enter ur email" required><br>
            <input type="password" name="password" placeholder="enter ur password" required><br>
            <button type="submit">log in</button>
        </form>
    </div>
       <p style="text-align:center; margin-top:10px;">
        Don't have an account? <a href="register.php">Register here</a>
    </p>
</body>
</html>




































<!-- 
include "db.php";
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
     $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        if($row['password']==$password){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['role']=$row['role'];
            header("Location: dashboard.php");
            exit();


        }else{
            header("Location: login.php");
            exit();
        }
    }else{
        echo "error!:  {$result->error}";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

< include "heading.php"; ?>

<body>
  <div class="register">
    <form action="login.php" method="post">
        
        <input type="email" name="email"placeholder="enter ur email"><br>
        <input type="password" name="password"placeholder="enter ur password"><br>
        
        <button type="submit">log in</button>
    </form>
  </div>
</body>
</html> -->