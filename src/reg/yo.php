<?php
require_once('constants.php');
require_once('../moyalali/connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');
$query='UPDATE events_main SET event_id="1047" WHERE event_id="1058" AND user_id="IN1108"';
mysqli_query($dbc,$query);
?>