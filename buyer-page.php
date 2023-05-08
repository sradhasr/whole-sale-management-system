<?php
include("database.php");
session_start();
if(!isset($_SESSION["login"]) || ($_SESSION["category"] != 'Buyer')) {
    header("Location: buyer.php?error=Your session expired. Login again");
    exit();
}
$query = "SELECT * FROM product";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
    <style>input[type=submit] {
    background-color: rgb(255, 178, 85);
    width: 100px;
    height: 50px;
    border-style: unset;
    border-radius: 10%;
    color: cornsilk;
    }</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "stylebp.css">
</head>
<body>
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "main-title">
                <h1>Available Stocks</h1>
            </div>

            <div class = "item-list">
            <?php
                while($data = $result->fetch_assoc()) {
            ?>
                <div class = "item">
                    <div class = "item-img">
                        <img src = "<?php echo $data['image_url']; ?>" width =300 alt="">
                    </div>
                    <div class = "item-detail">
                        <a href = "#" class = "item-name"><?php echo $data['pname']; ?></a>
                        <div class = "item-price">
                            <span class = "new-price">Rs.<?php echo $data['amount']; ?></span>
                        </div>
                        <div class = "item-price">
                            <span class = "new-price">Qty:<?php echo $data['stock']; ?></span>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
  </div>

  <div class="contain">
    <h2>Add to cart</h2>
</div>	
</br>
<div class="row">
<form action="add_product.php" method="post">
<fieldset id="f1">
    <label id="iname">Shirts and Tees</label>

    <label id="qty">Quantity</label>
    <input type="text" placeholder="100" class="form-control" id="quantity" name="quantity1">

    <label id="up">Unit Price</label>
    <input type="text" class="form-control" id="price" name="price1">

    </br>
    <p>Do you want to buy this?:</p>
      <input type="radio" id="yes" name="yes_or_no1" value="1">
      <label for="html">Yes</label>
      <input type="radio" id="no" name="yes_or_no1" value="0" checked>
      <label for="css">No</label><br>
    <label id="tp">Total Price</label>
    <input type="" id="totp" name="totp1">
</fieldset>  
<br>
<fieldset id="f2">
    <label id="iname">Pants and Jeans</label>
    <label id="qty">Quantity</label>
    <input type="text" placeholder="100" class="form-control" id="quantity" name="quantity2">

    <label id="up">Unit Price</label>
    <input type="text" class="form-control" id="price" name="price2">

    </br>
    <p>Do you want to buy this?:</p>
      <input type="radio" id="yes" name="yes_or_no2" value="1">
      <label for="html">Yes</label>
      <input type="radio" id="no" name="yes_or_no2" value="0" checked>
      <label for="css">No</label><br>
    <label id="tp">Total Price</label>
    <input type="" id="totp" name="totp2">
</fieldset>  
<br>
<fieldset id="f3">
    <label id="iname">Dresses</label>
    <label id="qty">Quantity</label>
    <input type="text" placeholder="100" class="form-control" id="quantity" name="quantity3">

    <label id="up">Unit Price</label>
    <input type="text" class="form-control" id="price" name="price3">

    </br>
    <p>Do you want to buy this?:</p>
      <input type="radio" id="yes" name="yes_or_no3" value="1">
      <label for="html">Yes</label>
      <input type="radio" id="no" name="yes_or_no3" value="0" checked>
      <label for="css">No</label><br>
    <label id="tp">Total Price</label>
    <input type="" id="totp" name="totp3">
</fieldset>  
<br>
<fieldset id="f4">
    <label id="iname">Shoes</label>
    <label id="qty">Quantity</label>
    <input type="text" placeholder="100" class="form-control" id="quantity" name="quantity4">

    <label id="up">Unit Price</label>
    <input type="text" class="form-control" id="price" name="price4">

    </br>
    <p>Do you want to buy this?:</p>
      <input type="radio" id="yes" name="yes_or_no4" value="1">
      <label for="html">Yes</label>
      <input type="radio" id="no" name="yes_or_no4" value="0" checked>
      <label for="css">No</label><br>
    <label id="tp">Total Price</label>
    <input type="" id="totp" name="totp4">
</fieldset> 
</br>
<fieldset id="f5">
    <label id="iname">Sandals</label>
    <label id="qty">Quantity</label>
    <input type="text" placeholder="100" class="form-control" id="quantity" name="quantity5">

    <label id="up">Unit Price</label>
    <input type="text" class="form-control" id="price" name="price5">

    </br>
    <p>Do you want to buy this?:</p>
      <input type="radio" id="yes" name="yes_or_no5" value="1">
      <label for="html">Yes</label>
      <input type="radio" id="no" name="yes_or_no5" value="0" checked>
      <label for="css">No</label><br>
    <label id="tp">Total Price</label>
    <input type="" id="totp" name="totp5">
</fieldset>  
<br> 
<br>
<input type="submit" id="trans" class="btn_btn-success" value="Done">
</form>

</div>

</body>
</html>
