<?php
    include("database.php");
    session_start();
    if(!isset($_SESSION["login"]) || ($_SESSION["category"] != 'Seller')) {
        header("Location: seller.php?error=Your session expired. Login again");
        exit();
    }
    $uidadd = $_SESSION['u_id'];
    $product = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $totp = $_POST['totp'];
    $date = date('Y-m-d');
    $query = "INSERT INTO `transaction`(`pidt`, `uidt`, `qty`, `amt`, `ip_date`, `order_date`) VALUES ($product, $uidadd, $quantity, $totp, '$date',NULL)";
    $qry1 = "UPDATE `product` SET stock= stock + $quantity WHERE pid = $product";
    if (!$conn->query($qry1) === TRUE) {  
        echo "Error: " . $qry1 . "<br>" . $conn->error;
    }
    
    if ($conn->query($query) === TRUE) {
        $transactionId =  $conn->insert_id;
        header("Location: transaction.php?transaction_id=$transactionId");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
 ?> 
