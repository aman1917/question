<?php
    session_start();
    include "config.php";

    if(isset($_POST['username']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username)){
        header("Location: login.php?error=UserName is Required");
        exit();
    }
    if(empty($password)){
        header("Location: login.php?error=Password is Required");
        exit();
    }

    $sql = "select * from login where username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) === 1){
        $row=mysqli_fetch_assoc($result);
            if($row['username'] === $username){
                echo "Logged IN|";
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                ?>
                <script language="javascript">
                    alert("User Login In");
                    top.location.href = "home.php";
                </script>
                <?php
                // header("Location:home.php");
                exit();
            }
            else{
                header("Location:login.php?error=Inncorrect UserName And Password");
                exit();
            } 
        }  
    else{
        header("Location:login.php");
        exit(); 
    }
    
?>