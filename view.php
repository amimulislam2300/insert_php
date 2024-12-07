<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
            background-color: #e2f7e2;
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

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "student_user";
        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $student = $conn->query("SELECT * FROM student");
        while (list($id, $name, $email) = $student->fetch_row()) {
            echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td class='action-span'><a href='view.php?deletedid=$id'>Delete</a></td>
                  </tr>";
        }

        // Delete action
        if (isset($_GET['deletedid'])) {
            $deleted_id = $_GET['deletedid'];
            $sql = "DELETE FROM student WHERE id = $deleted_id";
            if (mysqli_query($conn, $sql)) {
                header("Location: view.php");
            } 
        }
        
        mysqli_close($conn);
        ?>
    </table>

</body>
</html>
