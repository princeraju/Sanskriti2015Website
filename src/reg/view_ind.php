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
require_once('header.php');
 
        ?>
    <div align="center" style="margin-top:100px;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Sanskriti ID: <input type="text" name="id" autofocus style="font-size:25px; width:200px; text-transform:uppercase;" required><br/><br/>
        <input type="submit" name="submit" class="butt">
    </form>
    </div>
    
    <?php
    if(isset($_POST['submit'])||isset($_GET['id']))
    {
        if(isset($_POST['submit']))
            $id=$_POST['id'];
        else
            $id=$_GET['id'];
        $query='SELECT * FROM user_main WHERE id_reg="'.$id.'"';
        $data=mysqli_query($dbc,$query);
        if($row=mysqli_fetch_array($data))
        {
            echo '<fieldset>';
            echo '<legend>';
            if($row['type']=='ind'){ echo '<h2>Individual Registration</h2>'; }
            else if($row['type']=='grp') echo '<h2>Group Registration</h2>';
            echo '</legend>';
            if($_SESSION['type']=='reg')
                echo '<a href=edit.php?id='.$row['id_reg'].' class="butt no-print" style="text-decoration:none; padding:4px;">Edit</a><br/>';
            if($row['day_reg']==2)
                echo '<h3 style="color:#c6273f;">'."Yesterday's Registration</h3>";
            echo '<p><strong>Sanskriti ID</strong>: '.$row['id_reg'].'</p>';
            echo '<p><strong>Name';
            if($row['type']=='grp') echo 's'; //Making NAMES..instead of NAME
            echo ': </strong>'.str_replace(",","<strong>, </strong>",$row['name']).'</p>';
                if($row['message']!='') echo '<p><strong>Comment: </strong>'.$row['message'].'</p>';
            
            echo '<p><strong>College: </strong>'.$row['college'].'</p>';
            echo '<p><strong>Phone: </strong>'.$row['phone'].'</p>';
            echo '<p><strong>Email: </strong>'.$row['email'].'</p>';
            echo '<h3 style="color:#9e9e9e;">Events Participating</h3>';
            $query='SELECT * FROM `events_main` WHERE user_id="'.$row['id_reg'].'"';
            $data=mysqli_query($dbc,$query);
            while($row3=mysqli_fetch_array($data))
            {
                $query='SELECT name,closed FROM `main` WHERE id="'.$row3['event_id'].'"';
                $data4=mysqli_query($dbc,$query);
                if($row4=mysqli_fetch_array($data4))
                {  
                    echo '<strong>-</strong>'.$row4['name'];
                    if($row4['closed']=='yes')
                        echo '<strong style="color:#c6273f;"> [Registration Closed]</strong>';
                    echo '<br/>';
                }
            }
            echo '</fieldset>';
        }
        else
        {
            echo '<h2>User not found</h2>';
        }
    }
?>
</body>
</html>

<?php
mysqli_close($dbc);
?>