<?php
ini_set('max_execution_time', 300);
session_start();
require_once('constants.php');
require_once('../moyalali/connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');

$msg="";
if(!isset($_SESSION['type']))
    header('Location:login.php');
if(!isset($_SESSION['super']))
    header('Location:get_perm.php');

if(isset($_POST['submit']))
{
    $message7=$_POST['message'];
    $id=$_POST['id'];
    $query='UPDATE `main` SET `closed`="yes" WHERE id="'.$id.'"';
    mysqli_query($dbc,$query);
    
    $query='SELECT id,user_id FROM events_main WHERE event_id="'.$id.'" AND msg=0';
    $data=mysqli_query($dbc,$query);
    while($row=mysqli_fetch_array($data))
    {
        $query5='SELECT name,phone FROM user_main WHERE id_reg="'.$row['user_id'].'"';
        $data5=mysqli_query($dbc,$query5);
        $row5=mysqli_fetch_array($data5);
        $name=array_diff( explode(",",$row5['name']), array( '' ) );
        $name1=array_diff(explode(" ",$name['0']), array( '' ) );
        $message='Hi '.$name1['0'].', '."\n".$message7."\n".'-SANSKRITI';
        $mobiles=$row5['phone'];
        require('teset_message.php');
        
        $query='UPDATE `events_main` SET msg="1" WHERE id="'.$row['id'].'"';
        mysqli_query($dbc,$query);
    }
}

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('head.php'); ?>
</head>
<body>
<?php
require_once('header.php');
echo '<h3 style="color:#c6273f;">'.$msg.'</h3>';
echo '<h1>Select event to Close Registration.</h1>';
if(!isset($_GET['id']))
    {
        
        $query='SELECT * FROM main WHERE day="'.DAY.'" ORDER BY type DESC';
        $data=mysqli_query($dbc,$query);
        while($row=mysqli_fetch_array($data))
        {
            if(!in_array($row['id'],$out_array))
            {
            if($row['closed']=='yes')
                echo '<strong>'.$row['name'].'</strong>';
            else
                echo '<a href="'.$_SERVER['PHP_SELF'].'?id='.$row['id'].'">'.$row['name'].'</a>';
            echo ' ('.$row['type'].') ';
            if($row['closed']=='yes') {echo ' <strong style="color:#c6273f;">[Registration Closed]</strong>';}
            echo '<br/><br/>';
            }
        }
    }
else
{
    $id=$_GET['id'];
    $query='SELECT name FROM main WHERE id="'.$id.'"';
    $data=mysqli_query($dbc,$query);
    if($row=mysqli_fetch_array($data))
    {
        echo '<div style="margin-top:100px;" align="center">';
        ?>
        <h3 style="color:#19AA03;">Going to delete: <?php echo $row['name']?></h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            Message to be sent:<br/>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <textarea maxlength="110" style="width:500px; height:100px; font-size:18px;" name="message" required></textarea>
            <br/>
            <strong>
            -No need of salutation<br/>
            -Newline won't be available<br/>
            -Maximum characters limited to 110<br/><br/>
            -Event once cancelled is IRREVOKABLE<br/></strong>
            <input type="submit" name="submit" class="butt" value="CLOSE THE EVENT">
        </form>
    <?php
        echo '<br/><button class="butt"><a href="'.$_SERVER['PHP_SELF'].'" style="text-decoration:none;">I dont want to close the event now</a></button>';
        echo '</div>';
    }
}
?>
</body>
</html>
<?php
mysqli_close($dbc);
?>