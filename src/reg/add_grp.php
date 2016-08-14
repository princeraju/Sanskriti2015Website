<?php
$type="grp";

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
    $events=mysqli_real_escape_string($dbc,trim($_POST['events']));
    $events=rtrim($events,',');
    $events=array_diff( explode(',',$events) , array( '' ) );
    
    $query='SELECT * FROM user_main WHERE id_reg="'.$id_reg.'"';
    $data=mysqli_query($dbc,$query);
    if(mysqli_num_rows($data)>0) //Check if already registered
    {
        $msg="Error adding ID:".$id_reg.". It's already registered.";
        $id_reg="";
    }
    else
    {
        $query='INSERT INTO `user_main`(`id_reg`, `name`, `phone`, `email`, `college`, `message`, `type`) VALUES ("'.$id_reg.'","'.$name.'","'.$phone.'","'.$email.'","'.$college.'","'.$message.'","'.$type.'")';
        if(mysqli_query($dbc,$query))
        {
            $query='INSERT INTO events_main (`event_id`,`user_id`) VALUES ';
            foreach($events as $value)
            {
                $query.='("'.$value.'","'.$id_reg.'"),';
            }
            $query=rtrim($query,",");
            mysqli_query($dbc,$query);
            $msg='Successful adding user ID:<a href="view_ind.php?id='.$id_reg.'" target="_blank">'.$id_reg.'</a>';
            $id_reg=""; $name=""; $phone=""; $email=""; $message=""; $college="";
        }
        else
            $msg="Error Adding. Contact Admin.";
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
    if(isset($_SESSION['type']))
    {
        require_once('header.php');
    if($_SESSION['type']=='reg')
    {
        ?>
    <div class="reg_hold">
    <h1>Group Registration</h1>
    <h3><?php echo '<span style="color:#c6273f;">'.$msg.'<span>'; ?></h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>Sanskriti ID: <input name="id_reg" type="text" style="font-size:30px; width:200px; text-transform:uppercase;" autofocus value="<?php echo $id_reg;?>" required></p>
    </div>
        <p>Names: <input name="name" type="text" value="<?php echo $name;?>" required placeholder="Enter names separated by commas" style="width:500px;"></p>
        <p>Message: <input name="message" type="text" value="<?php echo $message;?>" style="width:700px; max-width:95%;" placeholder="Optional, INCLUDE DETAILS IF PARTICIPANTS FROM DIFFERENT COLLEGES"></p>
        <p>Phone: <input name="phone" type="text" value="<?php echo $phone;?>" maxlength="10" placeholder="Only 10 digits" required></p>
        <p>Email: <input name="email" type="email" value="<?php echo $email;?>" required></p>
        <p>College: <input name="college" type="text" value="<?php echo $college;?>" required></p>
        
                
        <input name="events" id="events" type="hidden" value="">
        <h4>Select events</h4>
        <?php
            $query='SELECT id,name,closed FROM main WHERE day="'.DAY.'" AND type="'.$type.'"';
            $data=mysqli_query($dbc,$query);
            while($row=mysqli_fetch_array($data))
            {
                if(!in_array($row['id'],$out_array))
                {
                echo '<input type="checkbox" class="box_event" id="'.$row['id'].'"> '.$row['name'];
                if($row['closed']=='yes') {echo ' <strong style="color:#c6273f;">[Registration Closed]</strong>';}
                echo '<br/>';
                }
            }
        ?>
        
        <p><input class="butt" type="submit" name="submit" value="Register"></p>
    </form>
    <?php
    }
    }
    ?>
</body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.box_event').change(function() {
                var final="";
                var temp;
                $('.box_event').each(function(i, obj) {
                    if($(this).prop('checked'))
                    {
                        final=final+$(this).attr('id')+",";
                    }
                });
                $('#events').val(final);
            });
        });
    </script>
</html>
<?php
mysqli_close($dbc);
?>