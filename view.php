<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM logbook_entries WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    nav {
        background-color: rgb(21, 65,108);
        padding: 0px 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        margin-right: 15px;
        font-weight: bold;
    }

    nav a:hover {
        text-decoration: underline;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
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

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        background-color: rgba(21, 65,108, 0.7);
        color: white;
    }

    a {
        color: yellowgreen;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <nav>
    <p style = "color: white; font-size: 30px; font-weight: bold">
            <span style = "color: white">LOG</span><span style = "color: yellowgreen">BOOK</span>
        </p>
        <div style = "display: flex; gap:50px; margin-right: 100px">
            <p><a href=" in and register.php" style = "text-decoration: none; color: white;">Home</a></p>
            <p><a href="add.html" style = "text-decoration: none; color: white;">Add New LogBook</a></p>
            <p><a href="logout.php" style = "text-decoration: none; color: white;">Logout</a></p>
        </div>
    </nav>

    <h1 style = "color: yellowgreen">LOGBOOKS LIST</h1>

    <table>
        <tr>
            <th>Entry date</th>
            <th>End Date</th>
            <th>Day</th>
            <th>Week</th>
            <th>Activity Description</th>
            <th>Working hour</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['entry_date'] . "</td>";
            echo "<td>" . $res['end_date'] . "</td>";
            echo "<td>" . $res['day'] . "</td>";
            echo "<td>" . $res['week'] . "</td>";
            echo "<td>" . $res['activity_description'] . "</td>";
            echo "<td>" . $res['working_hour'] . "</td>";
            echo "<td>" . $res['created_at'] . "</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>

</html>