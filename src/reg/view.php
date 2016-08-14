<?php
session_start();
if(!isset($_SESSION['type']))
    header('Location:login.php');
else if($_SESSION['type']!='reg'&&$_SESSION['type']!='view')
    header('Location:login.php');

require_once('constants.php');
require_once('../moyalali/connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');
?>
<!DOCTYPE>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('head.php'); ?>
</head>
<body>
   <?php
require_once('header.php');
    if(!isset($_GET['id']))
    {
        echo '<div class="reg_hold">';
        echo '<h2>List of events</h2> </div>';
        
        $query="SELECT * FROM main WHERE day=3 ORDER BY type DESC";
        $data=mysqli_query($dbc,$query);
        echo '<h4>21 March</h4>';
        while($row=mysqli_fetch_array($data))
        {
            if(!in_array($row['id'],$out_array))
            {
                $query5='SELECT * FROM events_main WHERE event_id="'.$row['id'].'"';
                $data5=mysqli_query($dbc,$query5);
                $num=mysqli_num_rows($data5);
                echo '<div style="padding:5px;">';
            echo '<a href="'.$_SERVER['PHP_SELF'].'?id='.$row['id'].'">'.$row['name'].'<strong style="color:#000;"> ('.$num.') </strong></a> | '; 
            echo ' ('.$row['type'].') ';
            if($row['closed']=='yes') {echo ' <strong style="color:#c6273f;">[Registration Closed]</strong>';}
            echo '</div>';
            }
        }
        $query="SELECT * FROM main WHERE day=2 ORDER BY type DESC";
        $data=mysqli_query($dbc,$query);
        echo '<h4>20 March</h4>';
        while($row=mysqli_fetch_array($data))
        {
            if(!in_array($row['id'],$out_array))
            {
                $query5='SELECT * FROM events_main WHERE event_id="'.$row['id'].'"';
                $data5=mysqli_query($dbc,$query5);
                $num=mysqli_num_rows($data5);
                echo '<div style="padding:5px;">';
            echo '<a href="'.$_SERVER['PHP_SELF'].'?id='.$row['id'].'">'.$row['name'].'<strong style="color:#000;"> ('.$num.') </strong></a> | ';
            echo ' ('.$row['type'].') ';
            if($row['closed']=='yes') {echo ' <strong style="color:#c6273f;">[Registration Closed]</strong>';}
            echo '</div>';
            }
        }
        
    }
else
{
    echo '<div class="reg_hold">';
    echo '<strong class="no-print"><br/><br/><a class="butt" href="'.$_SERVER['PHP_SELF'].'" style="text-decoration:none; padding:4px; font-size:18px;">Back</a></strong>';
    $var=$_GET['id'];
    $query='SELECT * FROM main WHERE id="'.$var.'"';
    $data=mysqli_query($dbc,$query);
    if($row=mysqli_fetch_array($data))
    {
        $type=$row['type'];
        echo '<h2>'.$row['name'].'</h2> ['.$row['id'].']';
        
        if($type=='ind') echo '<h3>Individual Event</h3>'; else if($type=='grp') echo '<h3>Group event</h3>';
        echo '</div>';//Finish reg_hold
        
        if($row['closed']=='no')
            echo '<h4 style="color:#c6273f;"> Event Registration Open <span style="color:#333;">|Contact Registration to close</span></h4>';
        else
            echo '<h4 style="color:#c6273f;"> Event Registration Closed</h4>';
        
        echo '<table>';
        echo '<tr><th>Sanskriti ID</th><th>Name</th><th>Phone Number</th><th>College</th></tr>';
        $query='SELECT user_id FROM events_main WHERE event_id="'.$row['id'].'"';
        $data=mysqli_query($dbc,$query);
        while($row=mysqli_fetch_array($data))
        {
            $query1='SELECT * FROM user_main WHERE id_reg="'.$row['user_id'].'"';
            $data1=mysqli_query($dbc,$query1);
            if($row1=mysqli_fetch_array($data1))
            {
            echo '<tr>';
                echo '<td><a href="view_ind.php?id='.$row1['id_reg'].'"><strong>'.$row1['id_reg'].'</a><strong></td>';
                echo '<td><strong>-'.str_replace(",","<br/>-",$row1['name']).'</strong>';
                if($row1['message']!='') echo '<br/>Comment: ['.$row1['message'].']';
                echo '</td>';
                
                echo '<td><strong>'.$row1['phone'].'</strong></td>';
                echo '<td><strong>'.$row1['college'].'</strong></td>';
            echo '</tr>';
            }
        }
        echo '<table>';
    }
    else
    {
        echo 'Error finding event';
    }
}
?>
</body>
</html>

<?php
mysqli_close($dbc);
?>