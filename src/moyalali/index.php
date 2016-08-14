<?php
session_start();
$continue='no';
if(isset($_SESSION['un']))
    if($_SESSION['un']=='yes')
        $continue='yes';
if($continue!='yes')
    header('Location:http://sanskritimace.com');
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
    <a href="add.php"><button>Add Event</button></a><br/>
    <a href="day.php?id=1"><button>19 March Events</button></a><br/>
    <a href="day.php?id=2"><button>20 March Events</button></a><br/>
    <a href="day.php?id=3"><button>21 March Events</button></a><br/>
</body>
    
</html>