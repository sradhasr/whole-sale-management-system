<?php
 session_start(); 
  include("database.php");
  $email = $_POST['username'];
  $pswrd = $_POST['password'];
  $category = $_POST['category'];

  if (!isset($email) || !isset($pswrd)) {
    if ($category == 1) {
      header("Location: seller.php?error=User Name/Password is required");
      exit();
    } else if ($category == 0) {
      header("Location: buyer.php?error=User Name/Password is required");
      exit();
    }
  }
  $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pswrd' AND catagory = $category";

  $result = $conn->query($query);
  if ($result->num_rows <= 0) {
    if ($category == 1) {
      header("Location: seller.php?error=User not exists");
      exit();
    } else if ($category == 0) {
      header("Location: buyer.php?error=User not exists");
      exit();
    }
  } else {
    $_SESSION['login'] = 1;
    $row = $result->fetch_array();
    if($row)
    {
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['u_id'] = $row['uid'];
      $_SESSION['category'] = $category ? 'Seller' : 'Buyer';
      $nextPage = $category ? 'sellerpage.php' : 'buyerpage.php';
      header("Location: $nextPage");
      exit();
    }
}
  // print_r($data);
?>
