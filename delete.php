<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_GET["id"])) {
        $userID = $_GET["id"]; 
        $query = "DELETE FROM users WHERE id = '{$userID}'";
        $result = mysqli_query($connect, $query); 

    } else {
        echo "Problem!";
    }
    ?>
