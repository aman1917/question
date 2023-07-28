<?php
    include "config.php";
    if(!isset($_POST['username'],$_POST['password'],$_POST['email'])){
        exit('Empty Field(s)');
    }
    if(empty($_POST['username'] || $_POST['password'] || $_POST['email'])){
        exit('Value Empty');
    }
    if($stmt = $conn->prepare('select id,password from login where username = ? ')){
        $stmt->bind_param('s',$_POST['username']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows()>0){
            echo 'Username Already Exits. Try Again';
        }
        else{
            if($stmt = $conn->prepare('insert into login(username,password,email) values(?,?,?)')){
                $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $stmt->bind_param('sss',$_POST['username'],$password,$_POST['email']);
                $stmt->execute();
                ?>
                <script language="javascript">
                    alert("User Register Successfully");
                    top.location.href = "login.php";
                </script>
                <?php
                header("Location:login.php");
            }
            else{
                echo 'Error Occured';
            }
        }
        $stmt->close();
    }
    else{
        echo 'Error Occured level 1';
    }
    $conn->close();
?>