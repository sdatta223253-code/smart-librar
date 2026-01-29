<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='user'){
    header("Location: login.php");
    exit;
}

include "db.php";

if(isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
    $user_id = $_SESSION['user_id'];

    // check quantity
    $q = mysqli_query($conn,"SELECT quantity FROM books WHERE id=$book_id");
    $book = mysqli_fetch_assoc($q);

    if($book['quantity'] > 0){
        mysqli_query($conn,"INSERT INTO transactions(user_id,book_id,issue_date,status)
                            VALUES($user_id,$book_id,NOW(),'borrowed')");
        mysqli_query($conn,"UPDATE books SET quantity=quantity-1 WHERE id=$book_id");
        header("Location: dashboard.php");
        exit;
    }else{
        echo "Book not available";
    }
}
?>
