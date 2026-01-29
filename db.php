<?php
$server="localhost";
$user="root";
$pass="";
$dbname="librarydb";
$conn=new mysqli($server,$user,$pass,$dbname);
if(!$conn){
   // echo "opps! : {}".$conn; //or
   echo "opps : {$conn->connect_error}";
  
}//else{
    //echo "successfully connected";
//}eta dile register.php teo ei line chole ashe jehetu imported

?>