<html>

<head>
    <title>Register</title>
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container a {
        color: #007bff;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
    }

    .container a:hover {
        text-decoration: underline;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: rgb(21,65,108);
        color: yellowgreen;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: yellowgreen;
        color: rgb(21,65,108);
    }

    .error {
        color: red;
        margin-top: 10px;
    }

    .success {
        color: green;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
    <a href="in and register.php" style = "color: rgb(21,65,108); text-decoration: none;">&larr; Back</a> <br />
        <?php
        include("connection.php");

        if (isset($_POST['submit'])) {
            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            if ($user == "" || $pass == "" || $email == "") {
                echo "<div class='error'>All fields should be filled. Either one or many fields are empty.</div>";
                echo "<a href='register.php'>Go back</a>";
            } else {
                $sql = "SELECT * from user_student WHERE  email= '$email';";
                $res = $mysqli->query($sql);

                if(mysqli_num_rows($res)> 0){
                    echo "<div class='error'>Email already exists.</div>";
                }else{
                    mysqli_query($mysqli, "INSERT INTO user_student(username, email, password) VALUES( '$user', '$email',md5('$pass'))")
                    or die("Could not execute the insert query.");

                    echo "<div class='success'>Registration successful</div>";
                    echo "<a href='in and register.php'>Login</a>";
                }
            }
        } else {
        ?>
        <h2 style = "color: yellowgreen">Register</h2>
        <form name="form1" method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>