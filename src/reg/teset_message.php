<?php

$authkey="7119AJ4ut4yV550833ae";
//$mobiles="9895940227";
//$message="Shail annaa...tell me if this message reaches you";
$message=urlencode($message);
$senderid="SANKTI";
$xml = file_get_contents("http://sms.ssdindia.com/api/sendhttp.php?authkey=".$authkey."&mobiles=".$mobiles."&message=".$message."&sender=".$senderid."&route=default");
//$xml = file_get_contents("http://sms.ssdindia.com/api/balance.php?authkey=".$authkey."&type=template");
//$xml="http://sms.ssdindia.com/api/sendhttp.php?authkey=".$authkey."&mobiles=".$mobiles."&message=".$message."&sender=".$senderid."&route=default";
?>
