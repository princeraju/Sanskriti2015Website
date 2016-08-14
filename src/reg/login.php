<?php
session_start();
if(!isset($_SESSION['try']))
    $_SESSION['try']=0;
if($_SESSION['try']>11)
    header('Location:http://sanskritimace.com');

if(isset($_SESSION['type']))
{
    header('Location:index.php');
}
if(isset($_POST['submit']))
{
    if($_POST['un']=="reg" && $_POST['pw']=="124kuttan")
    {
        session_regenerate_id();
        $_SESSION['type']="reg";
        header('Location:index.php');
    }
    else if($_POST['un']=="view" && $_POST['pw']=="256mace")
    {
        session_regenerate_id();
        $_SESSION['type']="view";
        header('Location:index.php');
    }
    else
        $_SESSION['try']=$_SESSION['try']+1;
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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    Username: <input type="text" name="un"><br/><br/>
    Password: <input type="password" name="pw"><br/><br/>
    <input class="butt" type="submit" name="submit" value="Login">
</form>
</body>
</html>

<?php
mysqli_close($dbc);
?>