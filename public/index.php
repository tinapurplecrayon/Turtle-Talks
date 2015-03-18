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


            
            
            <?php if(isset($_SESSION["user"])) {?>

            <div class="tweet_page">
                
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
</div>
</div>
                <?php } ?>
        
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Turtle Talks</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav nav-tabs" role="tablist">   
        <li class="active"><a href="#">Home</a></li>
          
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          About <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Meet the team</a></li>
            <li><a href="#">Bournmouth University</a></li>
          </ul>
        </li>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
                             <?php if(isset($_SESSION["user"])) {?> 
                    <div class="">
                        <div class="">
                                <form class= "" method="link" action="logout.php">
                                <input type="submit" value="Logout">
                                </form>
                                <a class="" href="delete.php?id=<?php echo $_SESSION["user_id"] ?>">Delete</a>
                        </div>
                        <div class=""><a>Hello, <?php echo ucfirst($_SESSION["user"]); ?>! </a></div>
                        <form class="" action="index.php" method="post">
                            What's up? <input type="text" name="tweet" value="" />
                            <input type="submit" name="submit" value="Submit" />
                        </form>
                    </div>
                    <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            

            
        
        
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

   
<?php
    mysqli_free_result($result);
    mysqli_close($connect);
?>


<div class="footer">
Copyright &copy; Turtletalks.com
</div>



<?php include_once("../includes/templates/footer.php"); ?> 
