<?php
    include "config.php";
     $firstname=$lastname=$email=$gender="";
    if(isset($_POST["submit"])){
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $email=$_POST["email"];
        $gender=$_POST["gender"];

    $sql = "insert into user(firstname,lastname,email,gender) values('$firstname','$lastname','$email','$gender')";
    $result=$conn->query($sql);
    
    if($result == true){
        echo "Record Is Successfully";
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>

<body>
    <h2>Sign Up Form</h2>
    <form action="<?php $_PHP_SELF ?>" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="firstname">FirstName:</label>
            <input type="text" name="firstname" id="firstname" required />
            <br><br>
            <label for="lastname">LastName:</label>
            <input type="text" name="lastname" id="lastname" required />
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required />
            <br><br>
            <label for="Gender">Gender:</label>
            <input type="radio" name="gender" value="male" />male
            <input type="radio" name="gender" value="female" />Female
            <br><br>
            <input type="submit" name="submit" id="submit" />
        </fieldset>
    </form>
</body>

</html>