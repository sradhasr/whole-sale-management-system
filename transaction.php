<?php
include("database.php");
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: buyer.php?error=Your session expired. Login again");
    exit();
}
$transaction_id = $_GET['transaction_id'];
$query = "SELECT * FROM transaction JOIN product ON transaction.pidt = product.pid WHERE tid = $transaction_id";
$result = $conn->query($query);
$date = $product_name = '';
$payment_status = 'Success';
$quantity = $amount = 0;
while($data = $result->fetch_array()) {
  $inpDate = ($_SESSION["category"] == 'Seller') ? $data['ip_date'] : $data['order_date'];
  $date = date('d/m/Y', strtotime($inpDate));
  $quantity += $data['qty'];
  $amount += $data['amt'];
  $product_name .= $data['pname'].', ';
}
$product_name = rtrim($product_name, ', ');
?>
<style>
    .transaction-details {
      padding-top: 100px;
      width: 500px;
      margin: 0 auto;
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    .header {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 40px;
    }
    body {
      background: rgba(221, 199, 160, 0.3);
    }
    
    table {
      margin: 0 auto;
      border-collapse: collapse;
    }
    
    tr:hover {background-color: coral;}
    
    td {
      border-bottom: 1px solid #ddd;
      
      padding: 20px;
      width: 100%;
    }
    a{
        text-decoration: none;
        color:#000000;
    }
    button{
        background-color: coral;
        width: 100px;
        height: 50px;
        
    }
    </style>
    <head><title>Transaction</title></head>
    <div class="transaction-details">
      <div class="header">Transaction Details</div>
     
      <table>
    
        <tr>
          <td><strong>Transaction ID</strong></td>
          <td><?php echo $transaction_id; ?></td>
        </tr>
        <tr>
          <td><strong>Date</strong></td>
          <td><?php echo $date; ?></td>
        </tr>
        <tr>
          <td><strong>Product Name</strong></td>
          <td><?php echo $product_name; ?></td>
          <!-- <td>Shoes</td> -->
        </tr>
        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $quantity; ?></td>
          <!-- <td>200</td> -->
        </tr>
    
          <td><strong>Total Amount</strong></td>
          <td>RS <?php echo $amount; ?></td>
        </tr>
        <tr>
          <td><strong>Payment Status</strong></td>
          <td><?php echo $payment_status; ?></td>
        </tr>
      </table>
    </br>
      <button><a href="invoice.php?transaction_id=<?php echo $transaction_id; ?>">Print Receipt</a></button>
    </div>
