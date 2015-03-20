<?php if(isset($_SESSION["user"])) {?> 
    <div class="box_tweet">    
<?php
    include_once("../includes/functions.php"); // Include the class library
    $timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
    // Query your database here and get timestamp
    $ts = $row["dateofpost"];
    $convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
    $when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
    ?>

    <div class="time_ago" <h2><?php echo "..".$when; ?></h2> </div>

      <div class="tweet_gender_body">   
        <div class="gender" <h2><?php echo ucfirst($row["gender"]).":"; ?></h2> </div>
        <div class="tweet" <p><?php echo ucfirst($row["tweet"]); ?></p> </div>
        <div class="place_of_post" <p><?php echo "Place: ".ucfirst($row["place_of_post"]); ?></p> </div>
    </div> 
    </div>

<?php } ?>
        
