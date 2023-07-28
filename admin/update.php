<?php
    include "config.php";
    if(isset($_POST['submit'])){
        $user_id =$_GET["id"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $email=$_POST["email"];
        $gender=$_POST["gender"];

        $sql = "update user set firstname='$firstname',
                                lastname='$lastname',
                                email='$email',
                                gender='$gender'
                where id=$user_id" ;
        $result = $conn->query($sql);
        if($result == true){
            // echo "Record Update Succesully";
            // alert("Record Update Succesully");
            // header('location: view.php');?>
            <script language="javascript">
                alert("Record Update Successfully");
                top.location.href = "view.php";
            </script>
            <?php
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }
    }
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $sql = "select * from user where id =$user_id";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $gender = $row['gender'];
                $id = $row['id'];    
            }

            ?>
<html>

<body>
    <h2>User Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="firstname">FirstName:</label>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>" required />
            <br><br>
            <label for="lastname">LastName:</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>" required />
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required />
            <br><br>
            <label for="Gender">Gender:</label>
            <input type="radio" name="gender" value="Male" <?php if($gender=='male'){ echo "checked";} ?> />male
            <input type="radio" name="gender" value="Female" <?php if($gender=='female'){ echo "checked";} ?>" />Female
            <br><br>
            <input type="submit" name="submit" id="submit" />
        </fieldset>
    </form>
</body>

</html>
<?php
  }else{
    //if id is not found redirect to view.hp page
    header('location: view.php');
}
}
?>