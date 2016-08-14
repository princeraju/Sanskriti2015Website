<?php
session_start();
if(!isset($_SESSION['type']))
    header('Location:login.php');

require_once('constants.php');
require_once('../moyalali/connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('head.php'); ?>
</head>
<body>
   <?php
    if(isset($_SESSION['type']))
    {
        require_once('header.php');
    if($_SESSION['type']=='reg'||$_SESSION['type']=='view')
    {
        ?>
    
    <div align="center" style="margin-left:-20px;">
        
        <?php
        if($_SESSION['type']=='reg')
        {?>
        <div class="reg_hold">
            <h1>Rocking Final Day of Sanskriti 2015</h1><br/>
            <h2><a href="add_ind.php">Individual Registration</a> <span style="color:#aaa;">|</span> <a href="add_grp.php">Group Registration</a>
                <h2><a href="edit.php">Edit Registration (ind/grp)</a></h2>

            <h4><a href="close_event.php">Close Event Registration</a></h4><br/><br/>
                </div>
        <?php } //Finish for reg view?>
            <?php
        if($_SESSION['type']=='view')
        {
            echo '<div class="reg_hold">';
            echo '<h1>SANSKRITI 2015</h1><br/>';
        }
        ?>
        <fieldset style=" border: none; border-color:#ddd; border-left:none; border-right:none; border-bottom:none;">
    <h2><a href="view.php">View Event List</a></h2><br/>
    <form method="post" action="view_ind.php"><strong>Sanskriti ID: </strong><input type="text" name="id" style="font-size:22px; width:150px; text-transform:uppercase;" required> <input class="butt" type="submit" name="submit" value="Search"></form>
       </fieldset>
        <?php
        if($_SESSION['type']=='view')
        {
            echo '</div>'; //Close second reg_hold
        }
        ?>
        
    </div>
    <br/><br/>
    <div style="font-size:15px; font-weight:bold; padding-left:10px; color:#777;">Emergency Contact: +91 8281073752 (Prince Raju)<br/>
        Registration Head: +91 9895940227 (Shail Babu)<br/>
        <br/><br/>In God We Trust!</div>
    <?php
    }
    }
    ?>
</body>
</html>


<?php
mysqli_close($dbc);
?>