<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='user'){
    header("Location: /LIBRARY/login.php");
    exit;
}

include "db.php";

$books = mysqli_query($conn,"SELECT * FROM books");
$uid = $_SESSION['user_id'];
$myBooks = mysqli_query($conn,"
    SELECT t.id AS tid, b.title, b.author, t.issue_date
    FROM transactions t
    JOIN books b ON t.book_id=b.id
    WHERE t.user_id=$uid AND t.status='borrowed'
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>
<style>
body{
    font-family:Arial;
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    padding:25px;
}
h2{color:#fff;}
table{
    width:100%;
    background:white;
    border-radius:12px;
    border-collapse:collapse;
    margin-bottom:40px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}
th, td{padding:12px;text-align:center;}
th{background:#4facfe;color:white;}
tr:nth-child(even){ background:#f2f9ff; }
img{width:60px;height:85px;object-fit:cover;}
a.btn{
    padding:6px 16px;
    border-radius:20px;
    color:white;
    text-decoration:none;
    font-size:14px;
    font-weight:bold;
}
.borrow{ background:#28a745; }
.return{ background:#ff4b5c; }
</style>
</head>
<body>

<h2>📚 Available Books</h2>
<table>
<tr>
<th>Title</th>
<th>Author</th>
<th>Image</th>
<th>Quantity</th>
<th>Action</th>
</tr>
<?php while($b=mysqli_fetch_assoc($books)): ?>
<tr>
<td><?= htmlspecialchars($b['title']) ?></td>
<td><?= htmlspecialchars($b['author']) ?></td>
<td><img src="/LIBRARY/image/<?= htmlspecialchars($b['image']) ?>"></td>
<td><?= $b['quantity'] ?></td>
<td>
<?php if($b['quantity']>0): ?>
<a class="btn borrow" href="borrow.php?book_id=<?= $b['id'] ?>">Borrow</a>
<?php else: ?>
<span>Not Available</span>
<?php endif; ?>
</td>
</tr>
<?php endwhile; ?>
</table>

<h2>📖 My Borrowed Books</h2>
<table>
<tr>
<th>Title</th>
<th>Author</th>
<th>Issue Date</th>
<th>Action</th>
</tr>
<?php while($m=mysqli_fetch_assoc($myBooks)): ?>
<tr>
<td><?= htmlspecialchars($m['title']) ?></td>
<td><?= htmlspecialchars($m['author']) ?></td>
<td><?= $m['issue_date'] ?></td>
<td><a class="btn return" href="return.php?transaction_id=<?= $m['tid'] ?>">Return</a></td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>


