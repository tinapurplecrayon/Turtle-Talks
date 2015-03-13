<?php if(isset($_SESSION["user"])) {?> 
<div class="box_tweet">
    
 <!--<div class="comment_bulk">
    <a>teeeeeest</a>
</div> -->  
    
    <h2><?php echo ucfirst($row["gender"]); ?></h2>
    <p><?php echo ucfirst($row["tweet"]); ?></p>
    

<!--
<div class="comment_post">
<form method='post'>
  Comment:<br />
  <textarea name='comment' id='comment'></textarea><br />

  <input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["gender"]; ?>' />

  <input type='submit' value='Submit' />  
</form>
</div>    
    
<div class="comment_bulk">
    <a>teeeeeest</a>
</div>
    
-->
    
</body>
</html>

    
</div>
<?php } ?>
        
