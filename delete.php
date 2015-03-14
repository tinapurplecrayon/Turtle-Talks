 <?php
if(isset($_POST["submit"])) {
    
    $_SESSION["id"] = $user["id"];
    $_SESSION["user"] = $user["name"];
    $_SESSION["gender"] = $user["gender"];
    $_SESSION["student_id"] = $user["student_id"];
    $_SESSION["password"] = $user["password"];
    
$query = "DELETE FROM users (id, name, gender, student_id, password) VALUES ('{$_SESSION['id']}', '{$_SESSION['user']}', '{$_SESSION['gender']}', '{$_SESSION['student_id']}', '{$_SESSION['password']}')";

} else {
    echo "Problem!";
}

header('Location: index.php');
exit;
?> 
