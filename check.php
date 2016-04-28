<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="user.php" method="post" id="check" name="check">
<input type="hidden" name="fromop" id="fromop" value="<?php echo $_POST['fromop']?>">
 <input type="hidden" name="toop" id="toop" value="<?php echo $_POST['toop']?>">
  <input type="hidden" name="fare" id="fare" value="<?php 
		$fromop=$_POST['fromop'];
		$toop=$_POST['toop'];
		$far=$toop-$fromop;
		if($far<0)
		$far=$far*-1;
		if($far>=0&&$far<=4)
		$fare=5;
		if($far>=5&&$far<=9)
		$fare=10;
		if($far>=10&&$far<=14)
		$fare=15;
		if($far>=15&&$far<=19)
		$fare=20;
		if($far>=20&&$far<=24)
		$fare=25;
		if($far>24)
		$fare=30;
		echo $fare;
		 ?>">
<script language="javascript" type="text/javascript">
    document.check.submit();
     </script>
     <noscript><input type="submit" value="verify submit"></noscript>
     </form>
     
    
     </body></html>
