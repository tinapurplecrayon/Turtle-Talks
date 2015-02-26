<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>
    
            <?php     
                if(isset($_POST["submit"])) {
                    $username = $_POST["username"]);
                    $password = ($_POST["password"]);
                    $query = "INSERT INTO posts (username, password) VALUES ('{$username}', '{$password}')";
                    $result = mysqli_query($connect, $query); 
                }
            ?>

            <form action="index.php" method="post">
                    Username: <input type="text" name="username" value=""/>
                   
                    Password: <input type="text" name="password" value=""/>
                    <input type="submit" name="login" value="Create Account" />
                </form>
           
        

<?php include_once("../includes/templates/footer.php"); ?>        
