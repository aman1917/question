<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
</body>

</html>
<?php }
    else{
        header("Location:login.php");
        exit();
    }
?>