<?php
include("database.php");
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: buyer.php?error=Your session expired. Login again");
    exit();
}
$transaction_id = $_GET['transaction_id'];
$query = "SELECT * FROM transaction JOIN product ON transaction.pidt = product.pid JOIN user ON transaction.uidt = user.uid WHERE tid = $transaction_id";
$result = $conn->query($query);
$date = $user_name = $user_addr = $user_phone = '';
$amount = 0;
while($data = $result->fetch_array()) {
  $inpDate = ($_SESSION["category"] == 'Seller') ? $data['ip_date'] : $data['order_date'];
  $date = date('d/m/Y', strtotime($inpDate));
  $amount += $data['amt'];
  $name = $data['user_name'];
  $address = $data['address'];
  $ph = $data['phone_no'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="stylei.css">

    <title>Invoice</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span>8000</span></p>
                    </div>
               
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                             <p><?php echo $_SESSION["category"]; ?></p> 
                            <h2> <?php echo $name ?></h2>
                            <p class="address"><?php echo $address ?></p>
                            <div class="txn mt-2">PHN: <?php echo $ph ?></div>
                        </div>
                         </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Gpay</span></p>
                            <!-- <p>Order Number: <span>#868</span></p> -->
                        </div>
                        <div class="col-5">
                            <p>Ordered Date: <span><?php echo $date ?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query($query);
                        $i = 1;
                        while($data = $result->fetch_array()) {
                            ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <p class="mt-2 item"><?php echo $i ?></p>
                                
                                    <div class="media-body">
                                        <p class="mt-0 title"><?php echo $data['pname'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $data['qty']; ?></td>
                            <td><?php echo $data['amount']; ?></td>
                            <td><?php echo $data['amt']; ?></td>
                        </tr>
                        <?php 
                        $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                    
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                        
                                <tr>
                                    <td>Total:</td>
                                    <td><?php echo $amount ?></td>
                                </tr>
                            </tfoot>
                        </table>

    
                    </div>
                </div>
            </section>
        
        </div>
    </div>
</body></html>
