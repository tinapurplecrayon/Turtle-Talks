<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
    if(isset($_POST["signup"])) {
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $student_id = $_POST['student_id'];
        $gender = $_POST["gender"];
        
        if(empty($name)) {
            $message = "Please enter valid name. ";
            echo '<div class="message">'.$message.'</div>';
        } else if(empty($password)) {
            $message = "Please enter valid password. ";
            echo '<div class="message">'.$message.'</div>';
        } else if(empty($confirm_password)) {
            $message = "Please enter password again. ";
            echo '<div class="message">'.$message.'</div>';
        } else if ($password != $confirm_password) {
            $message = "Passwords do not match. ";
            echo '<div class="message">'.$message.'</div>';
        } else if(empty($student_id)) {
            $message = "Please enter valid Student ID. ";
            echo '<div class="message">'.$message.'</div>';
        } else if(empty($gender)) {
            $message = "Please enter valid gender. ";
            echo '<div class="message">'.$message.'</div>';
        } else {
            $query = "INSERT INTO users (name, password, student_id, gender) VALUES ('{$name}', '{$password}', '{$student_id}','{$gender}')";
            $result = mysqli_query($connect, $query); 
            $message = "Your account has been registered!";
            echo $message; 
                if($result) {
                    $message = "Success, your account was added!";   
                } else {
                    $message = "Sorry, something went wrong!"; 
                }
                    $name = "";
                    $password = ""; 
                    $confirm_password = ""; 
                    $student_id = "";
                    $gender = "";
        }
    }
?>
