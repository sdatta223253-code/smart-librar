<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Library Home</title>
<style>
body {
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#667eea,#764ba2);
    font-family: Arial, sans-serif;
}
.container {
    background: #fff;
    padding: 40px;
    border-radius: 15px;
    text-align: center;
    width: 320px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}
a {
    display:block;
    margin: 12px 0;
    padding: 10px;
    background:#667eea;
    color:white;
    text-decoration:none;
    border-radius:25px;
    font-weight:bold;
}
a:hover{ background:#5a67d8; }
</style>
</head>
<body>
<div class="container">
<h2>📚 Library System</h2>

<?php if(isset($_SESSION['role'])): ?>
    <?php if($_SESSION['role'] === 'admin'): ?>
        <a href="/LIBRARY/admin/dashboard.php">Admin Dashboard</a>
    <?php else: ?>
        <a href="/LIBRARY/dashboard.php">User Dashboard</a>
    <?php endif; ?>
    <a href="/LIBRARY/logout.php">Logout</a>
<?php else: ?>
    <a href="/LIBRARY/login.php">Login</a>
    <a href="/LIBRARY/register.php">Register</a>
<?php endif; ?>
</div>
</body>
</html>

