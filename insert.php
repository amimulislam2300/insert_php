<?php


$conn = mysqli_connect('localhost', 'root', '', 'student_user');

if(isset($_POST['btnSubmit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO student(name, email) VALUES('$name','$email')";

    if(mysqli_query($conn, $sql) == TRUE){
        echo "Data Inserted";
        header('location:view.php');
    }else{
        echo "Not inserted";
    }

    if(mysqli_query($conn,$sql)) {
        header('location:view.php');
    }
    else {
        echo "data not found";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }
        th, td {
            padding: 12px 20px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: red;
        }
        a {
            text-decoration: none;
            color: #ff4c4c;
            font-weight: bold;
        }
        a:hover {
            color: #d32f2f;
        }
        .action-span {
            margin-top: 5px;
        }
    </style>
</head>
<body>
<h2>form</h2>
<form action="" method="post">
    Name: <input type="name" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <button type="submit" name="btnSubmit">submit</button>
    
</form>
</body>
</html>