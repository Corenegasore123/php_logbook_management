<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
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
        text-align: center;
    }

    #header {
        color: white;
        padding: 0px 30px;
        width: 100%;
        text-align: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgb(21,65,108);
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }


    a {
        color: rgb(21,65,108);
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    #footer {
        margin-top: 20px;
        padding: 10px;
        background-color: #f4f4f9;
        border-top: 1px solid #ccc;
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }
    </style>
</head>

<body>
    <div id="header">
        <p style = "color: white; font-size: 30px; font-weight: bold">
            <span style = "color: white">LOG</span><span style = "color: yellowgreen">BOOK</span>
        </p>
        <div style = "display: flex; gap:50px; margin-right: 100px">
            <p><a href="index.html" style = "text-decoration: none; color: white;">HOME</a></p>
        </div>
    </div>

    <div class="container">
        <?php
        if (isset($_SESSION['valid'])) {
            include("connection.php");
            $result = mysqli_query($mysqli, "SELECT * FROM user_student");
        ?>
        <p>Welcome to  <span style = "color: rgb(21,65,108); font-weight: bold;">LOG</span><span style = "color: yellowgreen; font-weight: bold;">BOOK</span>! <a href='logout.php' style = "color: red">Logout</a></p>
        <br />
        <a href='view.php'>View and Add <span style = "color: yellowgreen">LOGBOOKS</span></a>
        <br /><br />
        <?php
        } else {
            echo "<p>LOGIN TO YOUR ACCOUNT</p><br/>";
            echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
        }
        ?>
    </div>

    <div id="footer">
        Created with ❤️ by <a href="https://www.instagram.com/_corey_ne/" title="Igabe">Corene</a>
    </div>
</body>

</html>