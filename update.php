<?php

include('config.php');

// fetch data into input boxes 
$id=$_GET['id'];
$query="select * from crud where id = $id";
$run=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($run);

// update query 

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $query="update crud set name = '$name' , email = '$email' where id = $id";
    mysqli_query($conn,$query);
    header ("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <a href="index.php"><button style="background-color: blue; color: white; border-radius: 3px;">Home</button></a>
        <h2 class="text-center">Update Form</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required value="<?php echo $data['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email"
                    required value="<?php echo $data['email']; ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>
        </form>
    </div>

</body>

</html>