<?php
    include "config.php";
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $sql = "delete from user where id =$user_id";
        $result = $conn->query($sql);
        if($result == true){
            // echo "Record Delete Successfully";
            // alert("Record Delete Successfully")
            // header('location: view.php');
            ?>
            <script language="javascript">
                alert("Record Delete Successfully");
                top.location.href = "view.php";
            </script>
            <?php
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }
    }
        $conn->close();
?>