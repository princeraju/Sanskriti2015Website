<?php
session_start();
$continue='no';
if(isset($_SESSION['un']))
    if($_SESSION['un']=='yes')
        $continue='yes';
if($continue!='yes')
    header('Location:http://sanskritimace.com');
    
$message='';
require_once('connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');
if(isset($_POST['submit']))
{
    $name=mysqli_real_escape_string($dbc,trim($_POST['name']));
    $day=mysqli_real_escape_string($dbc,trim($_POST['day']));
    $description=nl2br($_POST['description']);
    $rules=nl2br($_POST['rules']);
    $contact=nl2br($_POST['contact']);
    $pref=$_POST['pref'];
    
    $query='INSERT INTO `main`( `name`, `day`, `description`, `rules`, `contact`, `pref`) VALUES ("'.$name.'","'.$day.'","'.$description.'","'.$rules.'","'.$contact.'","'.$pref.'")';
    if(mysqli_query($dbc, $query))
        $message='"'.$name.'" added';
    else
        $message='Error adding';
    
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
    <a href="index.php">Home</a>
    <h1>Add event</h1>
    <h2 style="color:#1BA6FC;"><?php echo $message?></h2>
    <form method="post" action="add.php">
    Name: <input type="text" name="name" required><br/><br/>
    Day: 
    <select name="day" required>
        <option value="1">Day1- 19 March</option>
        <option value="2">Day2- 20 March</option>
        <option value="3">Day3- 21 March</option>
    </select><br/><br/>
    Description:
    <br/>
    <textarea name="description" required></textarea><br/> <br/>
    Rules:
    <br/>
    <textarea name="rules" required></textarea><br/><br/>
    Contact:
    <br/>
    <textarea name="contact" required></textarea><br/><br/>
    Preference: <input type="number" name="pref" value="0" required> (Higher the value, higher will be it's position in event list)<br/><br/>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
    
</body>
    
</html>