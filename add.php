<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>

<head>
    <title>Add Data</title>
</head>

<body>
    <?php
    //including the database connection file
    include_once("connection.php");


    if (isset($_POST['Submit'])) {
        $entry_date = $_POST['entry_date'];
        $end_date = $_POST['entry_time'];
        $day = $_POST['day'];
        $week = $_POST['week'];
        $activity_desc = $_POST['activity_desc'];
        $working_hour = $_POST['working_hour'];
        $loginId = $_SESSION['id'];

        // checking empty fields
        if (empty($entry_date) || empty($end_date) || empty($day) || empty($week) || empty($activity_desc) || empty($working_hour)) {

            if (empty($entry_date)) {
                echo "<font color='red'>Entry Date field is empty.</font><br/>";
            }

            if (empty($end_date)) {
                echo "<font color='red'>End date field is empty.</font><br/>";
            }

            if (empty($day)) {
                echo "<font color='red'>Day field is empty.</font><br/>";
            }

            if (empty($week)) {
                echo "<font color='red'>Week field is empty.</font><br/>";
            }

            if (empty($activity_desc)) {
                echo "<font color='red'>Activity Description field is empty.</font><br/>";
            }

            if (empty($working_hour)) {
                echo "<font color='red'>Working Hour field is empty.</font><br/>";
            }

            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // if all the fields are filled (not empty) 

            //insert data to database	                
            $result = mysqli_query($mysqli, "INSERT INTO logbook_entries(entry_date, end_date, day, week, activity_description, working_hour, login_id) VALUES('$entry_date', '$end_date', '$day', '$week', '$activity_desc', '$working_hour' ,'$loginId')");

            if($result){
                header("Location: view.php");
            }
            }

        }
    ?>
</body>

</html>