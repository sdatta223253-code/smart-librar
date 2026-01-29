<?php
session_start();
/* ADMIN CHECK */
if ( $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $image=$_FILES['image']['name'];
    $quantity=$_POST['quantity'];
    include "../db.php";
   
$sql="insert into books(title,author,isbn,image,quantity) values('$title','$author','$isbn','$image','$quantity')";

$result=mysqli_query($conn,$sql);
   if(!$result){
        echo "error!: {$conn->error}";
    }else{
         $img_loc=$_FILES['image']['tmp_name'];
         $upload_loc="../image/";
         move_uploaded_file($img_loc, $upload_loc.$image);
         echo "book updated successfully";

       
    }




}


?>

<!DOCTYPE html>
<html lang="en">
<?php include "../heading.php"; ?>
<body style="background-color:#f2f6ff;">
    <div class="register">
 <form action="/LIBRARY/admin/add_book.php" method="Post" enctype="multipart/form-data">
        <h6 style="font-size:28px; font-weight:bold; margin:10px 0;">ADD BOOK</h6>


        Title<input type="text" name="title"><br>
       Author <input type="text" name="author"><br>
        Isbn<input type="text" name="isbn"><br>
        img <input class="file" type="file" name="image"><br>
        quantity<input type="text" name="quantity"><br>
     <button type="submit" class="btn">Add book</button>




    </form>


    </div>

</body>
</html>