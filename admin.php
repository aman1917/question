<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Admin LOGIN</title>
    <link rel='stylesheet' type='text/css' href='login.css'>
</head>

<body>
    <form action="login_check.php" method="post">
        <?php if(isset($_GET['error'])){ ?>
        <p class="error"> <?php echo $_GET['error'] ;?></p>
        <?php } ?>
        <h2>LOGIN</h2>
        <label>User Name</label>
        <input type="text" name="username" placeholder="User Name" required /><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required /><br>
        <input type="submit" name="Login">
    </form>
</body>

</html>