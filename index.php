<?php require_once("sessions.php"); ?>
<?php require_once("../includes/connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/templates/header.php"); ?>
  
<?php     
    if(isset($_POST["submit"])) {
        //$name = ucfirst($_POST["name"]);
        $tweet = ucfirst($_POST["tweet"]);
        //$gender = ucfirst($_POST["gender"]);
    } else {
        //$name = "";
        $tweet = ""; 
        //$gender = "";
    }


    if(isset($_POST["login"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE name='{$name}' AND password='{$password}'LIMIT 1";
        $result = mysqli_query($connect, $query); 
        
        if ($user = mysqli_fetch_assoc($result)) {
            $_SESSION["user"] = $user["name"];
            $_SESSION["gender"] = $user["gender"];
        } else {
            $message = "Please enter a valid username and password.";
            echo '<div class="message">'.$message.'</div>';
        }
    } 

?>

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

<?php
    if(isset($_POST["submit"])) {
        
        $tweet = $_POST['tweet'];
        
        //$gender = $_POST['gender'];
        
        if(empty($tweet)) {
            $message = "Invalid tweet";
        }//else if(empty($gender)) {
            //$message = "Please select gender";} 
        else {
            $query = "INSERT INTO posts (tweet, name, gender) VALUES ('{$tweet}', '{$_SESSION['user']}', '{$_SESSION['gender']}')"; //gender not yet added to sign_up, is not saved in table yet
            $result = mysqli_query($connect, $query); 

            if($result) {
                $message = "Success, your post was added!";   
            } else {
                $message = "Sorry, something went wrong!"; 
            }
            
            $tweet = "";
            $name = ""; 
            $gender = "";
  
        }
    }
?>

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
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div class="container">
            
            <?php if(isset($_SESSION["user"])) {?>
        </body>
            <body class="tweet_page">
            <?php } else {?>
                    <h1 class="register-title">Welcome</h1>
                    <div class="login_box">
                        <form action="index.php" method="post" autocomplete="off">
                            <p>You have an account?</p>
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
        

            
    </body>
    <body class="login_page">
           <?php if(isset($_SESSION["user"])) {?> 
            <div class="box_tweet_gender">
                <div class="box_hello">
                        <form class= "logout_button" method="link" action="logout.php">
                        <input type="submit" value="Logout">
                        </FORM>
                    </div>
                <div class="box_hello"><a>Hello, <?php echo ucfirst($_SESSION["user"]); ?>! </a></div>
                <form class="box_tweet_gender_content" action="index.php" method="post">
                    Tweet: <input type="text" name="tweet" value="<?php echo $tweet; ?>" />
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
  
        
        
        </div>

        <?php if(isset($_SESSION["user"])) {?>
            <div class="box_sort">
                <form action="index.php" method="post">
                    <select name="sort-by">
                        <option value="new">New</option>
                        <option value="old">Old</option> </p>
                    </select>
                </form>
        <?php } ?>
        </div>

    </body>
</html>
        <?php 
    
    mysqli_free_result($result);
    mysqli_close($connect);
?>


<?php include_once("../includes/templates/footer.php"); ?> 
