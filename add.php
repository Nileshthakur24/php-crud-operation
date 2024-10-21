<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <a href="index.php"><button style="background-color: blue; color: white; border-radius: 3px;">Home</button></a>
        <h2 class="text-center">Add Data Form</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email"
                    required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>

<?php


// 1. db connection 
// 2. isset 
// 3. query run

include('config.php');

if (isset($_POST['submit'])) {
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $query="insert into crud values('0','$name','$email')";
    
    if (mysqli_query($conn,$query)) {
        header("location:index.php");
    }
    else
    {
        echo "Data NOt Submitted";
    }

}



?>