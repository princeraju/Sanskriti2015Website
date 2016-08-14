<?php
$type="ind";
$err_msg="";
session_start();
if(!isset($_SESSION['type']))
    header('Location:login.php');
else if($_SESSION['type']!='reg')
    header('Location:login.php');

$msg="";
$id_reg=""; $name=""; $phone=""; $email=""; $message=""; $college="";
require_once('constants.php');
require_once('../moyalali/connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');

if(isset($_POST['submit']))
{
    $id_reg=strtoupper(mysqli_real_escape_string($dbc,trim($_POST['id_reg'])));
    $name=mysqli_real_escape_string($dbc,trim($_POST['name']));
    $phone=mysqli_real_escape_string($dbc,trim($_POST['phone']));
    $email=mysqli_real_escape_string($dbc,trim($_POST['email']));
    $message=mysqli_real_escape_string($dbc,trim($_POST['message']));
    $college=mysqli_real_escape_string($dbc,trim($_POST['college']));
    

        $query='UPDATE `user_main` SET `name`="'.$name.'", `phone`="'.$phone.'", `email`="'.$email.'", `college`="'.$college.'",`message`="'.$message.'" WHERE `id_reg`="'.$id_reg.'"';
        if(mysqli_query($dbc,$query))
        {
            $msg="Successful Updation";
        }
        else
            $msg="Error Adding. Contact Admin.";
    
        
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
    if(isset($_POST['id'])||isset($_GET['id']))
    {
        if(isset($_POST['id']))
            $id_reg=$_POST['id'];
        else if(isset($_GET['id']))
            $id_reg=$_GET['id'];
        $query='SELECT * FROM user_main WHERE id_reg="'.$id_reg.'"';
        $data=mysqli_query($dbc,$query);
        if($row=mysqli_fetch_array($data))
        {
            $name=$row['name'];
            $college=$row['college'];
            $phone=$row['phone'];
            $email=$row['email'];
            $message=$row['message'];
        ?>
    <div class="reg_hold">
    <h1>Edit Registration</h1>
    <h3><?php echo '<span style="color:#c6273f;">'.$msg.'<span>'; ?></h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>Sanskriti ID: <input name="id_reg" type="text" style="font-size:30px; width:200px; text-transform:uppercase; color:#ccc;" value="<?php echo $id_reg;?>" required readonly></p>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $id_reg; ?>">
        <p>Name: <input name="name" type="text" value="<?php echo $name;?>" required style="width:400px;"></p>
        <p>Message: <input name="message" type="text" value="<?php echo $message;?>" style="width:700px;" placeholder="Optional, Leave Blank if not necessary"></p>
        <p>Phone: <input name="phone" type="text" value="<?php echo $phone;?>" maxlength="10" placeholder="Only 10 digits" required></p>
        <p>Email: <input name="email" type="email" value="<?php echo $email;?>" required></p>
        <p>College: <input name="college" type="text" value="<?php echo $college;?>" required></p>
        
        <?php
         echo '<h3 style="color:#9e9e9e;">Events Participating</h3>';
            $query='SELECT * FROM `events_main` WHERE user_id="'.$id_reg.'"';
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
            ?>
        
        <p><input class="butt" type="submit" name="submit" value="UPDATE"></p>
    </form>
    <?php
        }
        else
        {
            $err_usr=1;
            echo '<h2 style="color:#c6273f;">User not found</h2>';
        }
    }
    else 
    {
       $err_usr=1;
    }
    if(isset($err_usr))
    {
    ?>
    <div class="reg_hold">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" align="center" style="margin-top:100px;">
        <h3>Give Sanskriti ID to edit</h3>
        <input type="text" name="id" style="text-transform:uppercase; font-size:18px; width150px;" autofocus required><br/>
        <input type="submit" name="submit5" value="EDIT" class="butt">
    </form>
    </div>
    <?php
    }
    ?>
</body>

</html>
<?php
mysqli_close($dbc);
?>