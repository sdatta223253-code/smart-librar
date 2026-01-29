<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!=='admin'){
    header("Location: ../login.php");
    exit;
}
include "../db.php";

$users = mysqli_query($conn,"SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>
<style>
    body{
        font-family:Arial;
        background:#f2f6ff;
        padding:30px;
    }
    table{
        width:100%;
        border-collapse:collapse;
        background:white;
        border-radius:10px;
        overflow:hidden;
        box-shadow:0 10px 25px rgba(0,0,0,.1);
    }
    th,td{
        padding:12px;
        text-align:center;
    }
    th{
        background:#4facfe;
        color:white;
    }
    tr:nth-child(even){
        background:#f1f5ff;
    }
</style>
</head>
<body>

<h2>👥 Manage Users</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
</tr>

<?php while($u=mysqli_fetch_assoc($users)): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['name']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><?= $u['role'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>
