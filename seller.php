<!DOCTYPE html>
<html>
    <head>
        <title>Seller</title>
        <link rel="stylesheet" type="text/css" href="./styles.css" > 
    </head>
    <body>
        <div class="bg-image"></div>
        <div class="bg-text">
        <h1>Login to continue</h1>
        <form method="post" action="login.php">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p> 
            <?php } ?>
            <label id="a" >Username:</label>
            <input type="text" name="username">
            </br></br>
            <label id="b" >Password:</label>
            <input type="password" name="password">
             <br></br>
             <input type="hidden" name="category" value="1">
            <input type="checkbox" id="check"> 
             <span>Remember me</span> 
            </br></br>
            <input type="submit" id="block" value="Login">     
        </form>
        <p>don't have an account?<h3><a href="newaccs.php" >create new </a></h3>  
    </body>
</html>
