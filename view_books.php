<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!=='admin'){
    header("Location: ../login.php");
    exit;
}
include "../db.php";
$result = mysqli_query($conn,"SELECT * FROM books");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Books</title>
<style>
    body{
        font-family:Arial;
        background:#f4f7ff;
        padding:30px;
    }
    table{
        width:100%;
        background:white;
        border-radius:12px;
        overflow:hidden;
        border-collapse:collapse;
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
    tr:nth-child(even){ background:#f2f6ff; }
    img{
        width:70px;
        height:90px;
        object-fit:cover;
    }
</style>
</head>
<body>

<h2>📚 Manage Books</h2>

<table>
<tr>
    <th>Title</th>
    <th>Author</th>
    <th>ISBN</th>
    <th>Image</th>
    <th>Quantity</th>
</tr>

<?php while($b=mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= htmlspecialchars($b['title']) ?></td>
    <td><?= htmlspecialchars($b['author']) ?></td>
    <td><?= $b['isbn'] ?></td>
    <td><img src="/LIBRARY/image/<?= htmlspecialchars($b['image']) ?>"></td>
    <td><?= $b['quantity'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
