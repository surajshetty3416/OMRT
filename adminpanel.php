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
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "loginadmin.php";
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

if ((isset($_POST['uid'])) && ($_POST['uid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM omrtdb WHERE `uid`=%s",
                       GetSQLValueString($_POST['uid'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($deleteSQL, $localhost) or die(mysql_error());

  $deleteGoTo = "adminpanel.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_User = "SELECT * FROM omrtdb WHERE accesslevel = 0 ORDER BY regdatetime ASC";
$User = mysql_query($query_User, $localhost) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);
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
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

<div class="container">
  <header><a href="index.php" class="clearfloat"><img src="lodtitle.png" width="961" height="210" alt="titlelogo"></a></header>
  <div class="sidebar1">
    <ul class="nav">
      <li><em><strong><a href="index.php">Home</a></strong></em></li>
      <li><em><strong><a href="<?php echo $logoutAction ?>">Logout</a></strong></em></li>
      <li><em><strong><a href="register.php">Registration</a></strong></em></li>
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a></strong></em></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Manage Users</h1>
    <table width="400" border="0">
      <tr>
        <th width="193" align="left" scope="col"><p>User</p></th>
        <th width="197" align="left" scope="col"><p>Password</p></th>
      </tr>
    </table>
    <section>
      <form action="" method="post" name="user" id="user">
        <?php if ($totalRows_User > 0) { // Show if recordset not empty ?>
          <?php do { ?>
            <table width="600" border="0">
              <tr>
                <td width="194"><strong><em><p><?php echo $row_User['username']; ?></p></em></strong></td>
                <td width="190"><p><?php echo $row_User['password']; ?></p></td>
                <td width="202"><input type="submit" name="register" id="register" value="Delete User">
                <input name="uid" type="hidden" id="uid" value="<?php echo $row_User['uid']; ?>"></td>
              </tr>
            </table>
            <?php } while ($row_User = mysql_fetch_assoc($User)); ?>
          <?php } // Show if recordset not empty ?>
      </form>
      <p>&nbsp;</p>
    </section>
    <h1>&nbsp;</h1>
    <section> </section>
  <!-- end .content --></article>
  <footer>
  <p>This is the official site of Online Metro Railway  Tickets (OMRT)</p></footer>
  <!-- end .container --></div>
</body>
</html>
<?php
mysql_free_result($User);
?>
