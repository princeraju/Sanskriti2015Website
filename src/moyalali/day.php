<?php
session_start();
$continue='no';
if(isset($_SESSION['un']))
    if($_SESSION['un']=='yes')
        $continue='yes';
if($continue!='yes')
    header('Location:http://sanskritimace.com');
    
    
require_once('connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');
if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $name=mysqli_real_escape_string($dbc,trim($_POST['name']));
    $description=nl2br($_POST['description']);
    $rules=nl2br($_POST['rules']);
    $contact=nl2br($_POST['contact']);
    $pref=$_POST['pref'];
    $id2=$_POST['id2'];
    
    $query='UPDATE `main` SET `name`="'.$name.'",`description`="'.$description.'",`rules`="'.$rules.'",`contact`="'.$contact.'",`pref`="'.$pref.'" WHERE id="'.$id.'"';
    mysqli_query($dbc,$query);
    header('Location:day.php?id='.$id2);
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
 <style>
    fieldset
     {
         width:500px;
         max-width:99%;
         border:3px solid;
         float:left;
     }
</style>   
</head>

<body>
    <a href="index.php">Home</a><br/>
    <?php
$id=0;
    if(isset($_GET['id']))
        $id=$_GET['id'];
    switch($id) 
    {
        case '1': echo '<h2>19 March</h2>'; break;
        case '2': echo '<h2>20 March</h2>'; break;
        case '3': echo '<h2>21 March</h2>'; break;
    }
    $query="SELECT * FROM main WHERE day=".$id." ORDER BY pref DESC";
    $data=mysqli_query($dbc, $query);
    while($row=mysqli_fetch_array($data))
    {
        echo '<p>';
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
        echo '<fieldset>';
        echo '<input type=hidden name="id2" value="'.$id.'">';
        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '<legend>'.$row['id'].' <strong>Pref: <input type="number" name="pref" value="'.$row['pref'].'" required></strong></legend>';
        echo '<input type="text" name="name" value="'.$row['name'].'" style="font-size:19px;" required>';
        ?>
        <p>
            <strong>Description</strong><br/> <textarea name="description" required><?php echo str_replace('<br />','',$row['description'])?></textarea>
        </p>
        <p>
            <strong>Rules</strong><br/> <textarea name="rules" required><?php echo str_replace('<br />','',$row['rules'])?></textarea>
        </p>
        <p>
            <strong>Contact</strong><br/> <textarea name="contact" required><?php echo str_replace('<br />','',$row['contact'])?></textarea>
        </p>
    <br/>
        <input type="submit" name="update" value="UPDATE" style="font-size:18px; background:#CE8A8A; border:thin; cursor:pointer; border-radius:5px;">
    <?php
        echo '</fieldset>';
        echo '</form>';
        echo '</p>';
    }
    ?>
</body>
    
</html>