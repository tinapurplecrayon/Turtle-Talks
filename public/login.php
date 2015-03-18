<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php     
    if(isset($_POST["submit"])) {
        $tweet = ucfirst($_POST["tweet"]);
    } else {
        $tweet = ""; 
    }
    if(isset($_POST["login"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE name='{$name}' AND password='{$password}'LIMIT 1";
        $result = mysqli_query($connect, $query); 
        
        if ($user = mysqli_fetch_assoc($result)) {
            $_SESSION["user"] = $user["name"];
            $_SESSION["gender"] = $user["gender"];
            $_SESSION["user_id"] = $user ["id"];
        } else {
            $message = "Please enter a valid username and password.";
            echo '<div class="message">'.$message.'</div>';
        }
    } 
?>
