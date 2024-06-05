<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $entry_date = $_POST['entry_date'];
    $end_date = $_POST['end_date'];
    $day = $_POST['day'];
    $week = $_POST['week'];
    $activity_desc = $_POST['activity_desc'];
    $working_hour = $_POST['working_hour'];

    // checking empty fields
    if (empty($entry_date) || empty($end_date) || empty($day) || empty($week) || empty ($activity_desc) || empty($working_hour)) {

        if (empty($entry_date)) {
            echo "<font color='red'>Entry Date field is empty.</font><br/>";
        }

        if (empty($end_date)) {
            echo "<font color='red'>End Date field is empty.</font><br/>";
        }

        if (empty($day)) {
            echo "<font color='red'>Day field is empty.</font><br/>";
        }
        if (empty($week)) {
            echo "<font color='red'>Week field is empty.</font><br/>";
        }

        if (empty($activity_desc)) {
            echo "<font color='red'>Acitvity Description field is empty.</font><br/>";
        }

        if (empty($working_hour)) {
            echo "<font color='red'>Working Hour field is empty.</font><br/>";
        }
    } else {
        // updating the table
        $result = mysqli_query($mysqli, "UPDATE logbook_entries SET entry_date='$entry_date', end_date='$end_date', day= '$day', week= '$week', activity_description='$activity_desc', working_hour= '$working_hour'  WHERE id=$id");

        // redirecting to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>

<?php
// getting id from url
$id = $_GET['id'];

// selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM logbook_entries WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $entry_date = $res['entry_date'];
    $end_date = $res['end_date'];
    $day = $res['day'];
    $week = $res['week'];
    $activity_desc = $res['activity_description'];
    $working_hour = $res['working_hour'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        background-color: rgb(21,65,108);
        color: yellowgreen;
        padding: 10px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: yellowgreen;
        color: rgb(21,65,108);
    }
    </style>
</head>

<body>
<nav>
        <p style = "color: white; font-size: 30px; font-weight: bold">
                <span style = "color: white">LOG</span><span style = "color: yellowgreen">BOOK</span>
            </p>
            <div style = "display: flex; gap:50px; margin-right: 100px">
                <p><a href="in and register.php" style = "text-decoration: none; color: white;">Home</a></p>
                <p><a href="view.php" style = "text-decoration: none; color: white;">View LogBooks</a></p>
                <p><a href="add.html" style = "text-decoration: none; color: white;">Add New LogBook</a></p>
                <p><a href="logout.php" style = "text-decoration: none; color: white;">Logout</a></p>
            </div>
    </nav>

    <h1 style = "color: yellowgreen;">Edit Data</h1>

    <form name="form1" method="post" action="edit.php">
        <table>
            <tr>
                <td><label for="entry_date">Starting date</label></td>
                <td><input type="text" id="entry_date" name="entry_date" value="<?php echo $entry_date; ?>"></td>
            </tr>
            <tr>
                <td><label for="end_date">End date</label></td>
                <td><input type="text" id="end_date" name="end_date" value="<?php echo $end_date; ?>"></td>
            </tr>
            <tr>
                <td><label for="day">Day</label></td>
                <td><input type="text" id="day" name="day" value="<?php echo $day; ?>"></td>
            </tr>
            <tr>
                <td><label for="week">Week</label></td>
                <td><input type="text" id="week" name="week" value="<?php echo $week; ?>"></td>
            </tr>
            <tr>
                <td><label for="activity_desc">Activity Description</label></td>
                <td><input type="text" id="activity_desc" name="activity_desc" value="<?php echo $activity_desc; ?>"></td>
            </tr>
            <tr>
                <td><label for="working_hour">Working Hour</label></td>
                <td><input type="text" id="working_hour" name="working_hour" value="<?php echo $working_hour; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>