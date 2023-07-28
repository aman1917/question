<?php
    include "config.php";
    $sql = "select * from user";
    $result = $conn->query($sql);
?>
<!doctype html>
<html>

<head>
    <title>View Pages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>User List</h2>
        <a class="btn btn-info" href=" craete.php">Add User</a>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>FirstName</td>
                    <td>LastName</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td>
                        <a class="btn btn-info" href=" update.php?id='<?php echo $row['id']; ?>'">Edit</a>&nbsp;
                        <a class=" btn btn-danger" href=" delete.php?id='<?php echo $row['id']; ?>'">Delete</a>&nbsp;
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
