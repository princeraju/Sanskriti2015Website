<?php
session_start();
if(!isset($_SESSION['type']))
    header('Location:login.php');
if(isset($_POST['submit']))
{
    if($_POST['pw']=='ready123')
    {
        $_SESSION['super']=1;
        header('Location:close_event.php');
    }
}

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
require_once('header.php');
?>
    <div class="reg_hold">
<h2>Closing an event requires SuperAdmin Permission.</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="password" name="pw" placeholder="Pass Code"><br/>
        <input type="submit" name="submit" class="butt">
    </form>
    </div>
</body>
</html>


<?php
mysqli_close($dbc);
?>