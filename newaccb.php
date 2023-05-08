<!DOCTYPE html>
<html>
    <head>
        <title>New account Buyer</title>
        <link rel="stylesheet" type="text/css" href="./stylenb.css" > 
    </head>
<body>
    <div>

<form method="post" action="newaccaction.php">
    <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p> 
            <?php } ?>
    <label for="name">Name of the user :</label>
    <input type="text" placeholder="Enter your name" name="name"/>
                <br><br>
                <label for="email">email address :</label>
                <input type="email" placeholder="enter your mail address" name="email"/>
                <br><br>
                <label>create new password:</label>
                <input type="password" name="password">
                <br>
                <br>
<input type="hidden" id="buyer_seller" name="buyer_seller" value="0">    
<fieldset>
<legend> Address:</legend>
<label for="saddress">Current Address:</label>
<br>
<textarea rows="6" cols="30" placeholder="Enter the address " id="saddress" name="saddress"></textarea>
<br>
</fieldset>
    </br></br>
<label for="phn">Phone Number:</label>
<input type="tel" id="phn" name="phn">
<br><br>
<input type="reset">
<input type="submit">
</form>
    </div>
</body>
</html>
