<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>
    <h2>Homepage</h2>
    <p>
        <a href="add.php" style="background-color: #3498db; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Add New Data</a>
    </p>
    <table>
        <tr bgcolor='#3498db' style="color: #fff;">
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['age'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\" style=\"color: #2ecc71;\">Edit</a> | 
            <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style=\"color: #e74c3c;\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
