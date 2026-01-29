<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='user'){
    header("Location: login.php");
    exit;
}

include "db.php";

if(isset($_GET['transaction_id'])){
    $tid = $_GET['transaction_id'];

    // get book id
    $q = mysqli_query($conn,"SELECT book_id FROM transactions WHERE id=$tid");
    $t = mysqli_fetch_assoc($q);
    $book_id = $t['book_id'];

    mysqli_query($conn,"UPDATE transactions 
                        SET return_date=NOW(), status='returned' 
                        WHERE id=$tid");

    mysqli_query($conn,"UPDATE books SET quantity=quantity+1 WHERE id=$book_id");

    header("Location: dashboard.php");
    exit;
}
?>
