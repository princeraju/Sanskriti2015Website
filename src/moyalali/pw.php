<?php
session_start();
if(isset($_SESSION['un']))
    if(isset($_SESSION['un'])=='yes')
        header('Location:index.php');
if(isset($_POST['submit']))
{
    if($_POST['username']=='hacker' && $_POST['password']=='justrock3')
    {
        
        session_regenerate_id();
        $_SESSION['un']='yes';
        header('Location:index.php');
    }
}
?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sanskriti 15</title>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">

<meta name="description" content="Sanskriti, the arts fest of Mar Athanasius College of Engineering, Kothamangalam"/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    </head>
    
<body>
    <form method="post" action="pw.php">
        <input type="text" name="username" placeholder="Username">
    <input type=password name="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>