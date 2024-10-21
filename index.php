<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            /* background-color: black; */
        }

        * {

            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            margin: 20px 0;
            text-align: center;
        }

        button {
            padding: 10px 15px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .insert {
            background-color: #28a745;
            color: white;
        }

        .edit {
            background-color: #007bff;
            color: white;
        }

        .delete {
            background-color: #dc3545;
            color: white;
        }

        .button-container button:hover {
            opacity: 0.8;
        }

      
    </style>
</head>

<body>

    <div class="container">
        <h1>CRUD Operations</h1>





        <div class="button-container">
            <a href="add.php"> <button class="insert"><i class="fas fa-plus"></i> Insert</button></a>

        </div>
        <div class="search">
       <form method="get">
       <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" name="search" value="<?php 
  
  if (isset($_GET['search'])) {
    echo $_GET['search'];
  }
  ?>">
  <button class="btn btn-danger">Search</button>
       </form>
    </div>
        </div>

<?php

// include('config.php');
$conn = mysqli_connect("localhost","root","","youtube_crud");

if (isset($_GET['search'])) {
    $word=$_GET['search'];
    $query="select * from crud where concat(id,name,email) like '%$word%'";
    $run=mysqli_query($conn,$query);

    if ($arr = mysqli_fetch_array($run)) {
        ?>
        <table>
            <tr>
            <th style="background:red; color:white;">ID</th>
            <th style="background:red; color:white;">NAME</th>
            <th style="background:red; color:white;">EMAIL</th>
            </tr>
            <tr>
                <td><?php echo $arr['id'];  ?></td>
                <td><?php echo $arr['name'];  ?></td>
                <td><?php echo $arr['email'];  ?></td>
            </tr>
        </table>
 

<?php
    }
    else {
        ?>
        <tr><td>No Records Found</td></tr>
        <?php
    }
}    
    

?>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            
            // 1. db connection 
            // 2. query 
            // 3. query run 

            include('config.php');
            $query="select*from crud";
            $run=mysqli_query($conn,$query); 
            foreach($run as $row):      
            ?>
            <tr>
                <td>
                    <?php echo $row['id'] ?>
                </td>
                <td>
                    <?php echo $row['name'] ?>
                </td>
                <td>
                    <?php echo $row['email'] ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>"><button
                            style="background-color:blue; color:white;">Update</button></a>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>"><button
                            style="background-color:blue; color:white;">Delete</button></a>
                </td>
            </tr>

            <?php
            endforeach;
            ?>

        </table>
    </div>

</body>

</html>