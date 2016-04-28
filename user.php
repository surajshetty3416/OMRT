<?php require_once('Connections/localhost.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['MM_fromop']= NULL;
  $_SESSION['MM_toop']= NULL;
  $_SESSION['MM_fare']=NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php?var=0";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_localhost, $localhost);
$query_User = "SELECT * FROM omrtdb";
$User = mysql_query($query_User, $localhost) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);

$colname_UserDB = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_UserDB = $_SESSION['MM_Username'];
}
mysql_select_db($database_localhost, $localhost);
$query_UserDB = sprintf("SELECT * FROM `user db` WHERE username = %s", GetSQLValueString($colname_UserDB, "text"));
$UserDB = mysql_query($query_UserDB, $localhost) or die(mysql_error());
$row_UserDB = mysql_fetch_assoc($UserDB);
$totalRows_UserDB = mysql_num_rows($UserDB);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>OMRT</title>
<link href="css/main.css" rel="stylesheet" type="text/css">

<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="css/button1.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
</head>

<body>

<div class="container">
  <header><a href="index.php" class="clearfloat"><img src="lodtitle.png" width="961" height="210" alt="titlelogo"></a> </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><em><strong><a href="index.php">Home</a></strong></em></li>
      <li><em><strong><a href="<?php echo $logoutAction ?>">Logout</a></strong></em></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
<section>
  <form action="<?php echo $editFormAction; ?>" method="POST" name="register" id="register2">
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">E-Wallet</li>
        <li class="TabbedPanelsTab" tabindex="0"><em><strong>Previous Journey</strong></em></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent"> <?php echo $row_UserDB['e-wallet cash']; ?></div>
        <div class="TabbedPanelsContent"><?php echo $row_UserDB['previous journey']; ?></div>
      </div>
    </div>
    <p>&nbsp;</p>
  </form>
</section>
<h1>Welcome   <?php echo $_SESSION['MM_Username'] ?> ...</h1>
    <p>Your journey will be from <?php
	$a=$_POST['fromop'];
	 switch($a){ case 1: echo"CST"; break;
            case 2: echo"Masjid"; break;
            case 3: echo"Sandhurst"; break;
            case 4: echo"Byculla"; break;
            case 5: echo"Chinchpokli"; break;
            case 6: echo"Currey Road"; break;
            case 7: echo"Parel"; break;
            case 8: echo"Dadar"; break;
            case 9: echo"Matunga"; break;
            case 10: echo"Sion"; break;
            case 11: echo"Kurla"; break;
            case 12: echo"Vidyavihar"; break;
            case 13: echo"Ghatkopar"; break;
            case 14: echo"Vikhroli"; break;
            case 15: echo"Kanjurmarg"; break;
            case 16: echo"Bhandup"; break;
            case 17: echo"Nahur"; break;
            case 18: echo"Mulund"; break;
            case 19: echo"Thane"; break;
            case 20: echo"Kalwa"; break;
            case 21: echo"Mumbra"; break;
            case 22: echo"Diva"; break;
            case 23: echo"Lower Kopar"; break;
            case 24: echo"Dombivali"; break;
            case 25: echo"Thakurli"; break;
            case 26: echo"Kalyan"; break;} ?> to <?php  $b=$_POST['toop'];			
           switch($b){case 1: echo"CST"; break;
            case 2: echo"Masjid"; break;
            case 3: echo"Sandhurst"; break;
            case 4: echo"Byculla"; break;
            case 5: echo"Chinchpokli"; break;
            case 6: echo"Currey Road"; break;
            case 7: echo"Parel"; break;
            case 8: echo"Dadar"; break;
            case 9: echo"Matunga"; break;
            case 10: echo"Sion"; break;
            case 11: echo"Kurla"; break;
            case 12: echo"Vidyavihar"; break;
            case 13: echo"Ghatkopar"; break;
            case 14: echo"Vikhroli"; break;
            case 15: echo"Kanjurmarg"; break;
            case 16: echo"Bhandup"; break;
            case 17: echo"Nahur"; break;
            case 18: echo"Mulund"; break;
            case 19: echo"Thane"; break;
            case 20: echo"Kalwa"; break;
            case 21: echo"Mumbra"; break;
            case 22: echo"Diva"; break;
            case 23: echo"Lower Kopar"; break;
            case 24: echo"Dombivali"; break;
            case 25: echo"Thakurli"; break;
            case 26: echo"Kalyan"; break;} ?> </p>
    <p>And Fare Will Be ₹ <?php echo $_POST['fare']; ?> </p>
    <form action="paymentnupdate.php" method="post" name="final" id="final">
    <input type="hidden" name="fare" id="fare" value="<?php echo $_POST['fare']; ?>">
    <input type="hidden" name="toop" id="toop" value="<?php echo $_POST['toop']; ?>">
    <input type="hidden" name="fromop" id="fromop" value="<?php echo $_POST['fromop']; ?>">
      <input type="submit" name="proceed" id="proceed" value="Proceed &gt;&gt;">
    </form>
    <section>
      <form action="<?php echo $editFormAction; ?>" method="POST" name="register" id="register">
      </form>
    </section>
    <h1>&nbsp;</h1>
    <section> </section>
  <!-- end .content --></article>
  <footer>
  <p>This is the official site of Online Metro Railway  Tickets (OMRT)</p></footer>
  <!-- end .container --></div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
<?php
mysql_free_result($User);

mysql_free_result($UserDB);
?>
