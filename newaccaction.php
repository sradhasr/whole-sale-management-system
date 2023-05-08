<?php
 session_start(); 
  include("database.php");
 /* $qry = "SELECT * FROM product";
  $result = $conn->query($qry);*/

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $buyer_seller = $_POST['buyer_seller'];
  $saddress = $_POST['saddress'];
  $phn = $_POST['phn'];
  
  $query = "INSERT INTO `user`(`user_name`, `email`, `password`, `catagory`, `address`, `phone_no`) VALUES ";
  //$result = $result + 1;
  $query .= "('$name','$email','$password','$buyer_seller','$saddress','$phn')";
  if($buyer_seller){
  if ($conn->query($query) === TRUE) {
    header("Location: seller.php");
  exit();
} else {
echo "Error: " . $query . "<br>" . $conn->error;
}}
else{
  if ($conn->query($query) === TRUE) {
    header("Location: buyer.php");
  exit();
} else {
echo "Error: " . $query . "<br>" . $conn->error;
}}
  ?>
