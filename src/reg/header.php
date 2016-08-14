<div class="header_cont no-print">
<span id="header" class="no-print"><a href="index.php">Home</a> | <a href="logout.php">Logout</a></span>
    <strong>| SANSKRITI 2015</strong>
    
<strong class="no-print" style="float:right; border:2px solid; border-color:#19aa03; padding:4px; border-radius:3px; margin-right:30px;"><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" style="text-decoration: none;">RELOAD</a></strong>
</div>
<?php
require_once('constants.php');
if(DAY==0)
    echo '<h2 style="color:#c6273f;">Registration is stopped by the Superadmin.</h2>';
?>