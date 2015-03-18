<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/signup.php"); ?>
<?php require_once("../includes/post_submit.php"); ?>
<?php require_once("../includes/login.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>

<?php 
    if(isset($_POST["sort"])) {
        $sort = $_POST["sort-by"];
        
        if(strcmp($sort, "new") == 0) {
            $query = "SELECT * FROM posts ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM posts ORDER BY id ASC";
        }
        
    } else {
        $query = "SELECT * FROM posts ORDER BY id DESC";
    }

    $result = mysqli_query($connect, $query); 
    if(!$result) {
        die("Query Error");  
    }
?>

<!doctype html>
<html>
    <head>
        <title>Format Code</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    
        <div class="container">
            
            <?php if(isset($_SESSION["user"])) {?>

            <body class="tweet_page">
                <?php } else {?>
                        <div class="register-title"></p></div>
                        <div class="login_box">
                            <form action="index.php" method="post" autocomplete="off">
                                <input type="text" name="name" value="" placeholder="Name"/>
                                <input type="password" name="password" value="" placeholder="Password"/>
                                <input type="submit" name="login" value="Login" /></p>
                            </form> </div>

                        <div class="login_toggle">
                        <p> No account?</p>
                        </div>

                         <div class="sign_up_box">   
                                <p>No account? Sign up.</p>
                                <form action="index.php" method="post" autocomplete="off">
                                <div class="register-switch">
                                      <input type="radio" name="gender" value="female" id="sex_f" class="register-switch-input" checked>
                                      <label for="sex_f" class="register-switch-label">Female</label>
                                      <input type="radio" name="gender" value="male" id="sex_m" class="register-switch-input">
                                      <label for="sex_m" class="register-switch-label">Male</label>
                                    </div>
                                <input type="text" name="name" value="" placeholder="Name"/>
                                <input type="password" name="password" value="" placeholder="Password"/>
                                <input type="password" name="confirm_password" value="" placeholder="Confirm Password"/>
                                <input type="text" name="student_id" value="" placeholder="Student ID"/>
                                <div class="dropdown">    
                                    <input type="submit" name="signup" value="Sign up!"/> </p> 
                                </form>

                        </div>
                <?php } ?>
        

            
                <body class="login_page">
                   <?php if(isset($_SESSION["user"])) {?> 
                    <div class="box_tweet_gender">
                        <div class="box_hello">
                                <form class= "logout_button" method="link" action="logout.php">
                                <input type="submit" value="Logout">
                                </form>
                                <a class="delete" href="delete.php?id=<?php echo $_SESSION["user_id"] ?>">Delete</a>
                        </div>
                        <div class="box_hello"><a>Hello, <?php echo ucfirst($_SESSION["user"]); ?>! </a></div>
                        <form class="box_tweet_gender_content" action="index.php" method="post">
                            What's up? <input type="text" name="tweet" value="" />
                            <input type="submit" name="submit" value="Submit" />
                        </form>
                    </div>
                    <?php } ?>

            
        
        
                    <?php
                        $x = 1; 
                        while($row = mysqli_fetch_assoc($result)) {
                            if ($x % 2 == 0) {
                                include 'box.php';
                            } else {
                                include 'box2.php';
                            }
                            $x++;
                        }
                    ?>

    </body>
</html>

<?php
    mysqli_free_result($result);
    mysqli_close($connect);
?>


<div class="footer">
Copyright &copy; Turtletalks.com
</div>



<?php include_once("../includes/templates/footer.php"); ?> 
