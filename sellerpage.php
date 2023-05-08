<?php
include("database.php");
session_start();
if(!isset($_SESSION["login"]) || ($_SESSION["category"] != 'Seller')) {
    header("Location: seller.php?error=Your session expired. Login again");
    exit();
}
$query = "SELECT * FROM product";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Items</title>
    <style>input[type=submit] {
    background-color: rgb(98, 79, 55);
    width: 100px;
    height: 50px;
    border-style: unset;
    border-radius: 10%;
    }</style>
<meta name="viewport" content="user-scalable=no,width=device-width"/>
<link rel="stylesheet" type="text/css" href="stylesp.css">

</head>
<body>
<div class="tot">    
<div class="container">
    <h1>Input your stocks</h1>
</div>	
</br>
<div class="row">
</br>
<form method="post" action="add_stock.php">
<br>
<fieldset id="f5">
    <label id="iname">Item Name</label></br>
    <select name="name">
        <?php
            while($data = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $data['pid'] ?>"><?php echo $data['pname'] ?></option>
        <?php } ?>
    </select>
    </br></br></br></br>
    <label id="qty">Quantity</label></br>
    <input type="text" placeholder="" class="form-control" id="quantity" name="quantity">
    </br></br></br></br>
    <label id="up">Unit Price</label></br>
    <input type="text" class="form-control" id="price" name="price" value="">
    </br></br></br></br>
    <label id="tp">Total Price</label></br>
    <input type="" id="totp" name="totp" value="0">
</fieldset>  
<br>
<input type="submit" id="trans" class="btn btn-success" value="Done">
</div>
</form>
</div>
</body>
</html>
