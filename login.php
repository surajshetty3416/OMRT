<?php require_once('Connections/localhost.php'); ?>
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
$query_Login = "SELECT * FROM omrtdb";
$Login = mysql_query($query_Login, $localhost) or die(mysql_error());
$row_Login = mysql_fetch_assoc($Login);
$totalRows_Login = mysql_num_rows($Login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['userid'])) {
  $loginUsername=$_POST['userid'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "select.php";
  $MM_redirectLoginFailed = "login.php?var=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_localhost, $localhost);
  
  $LoginRS__query=sprintf("SELECT username, password FROM omrtdb WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $localhost) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>OMRT </title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
      <li><em><strong><a href="register.php">Registration</a></strong></em></li>
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="notification.php">Notificaton</a></strong></em></li>
      <li><em><strong><a href="enqhelp.php">Enquiry/help</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a> </strong></em></li>
    </ul>
  <em><strong><!-- end .sidebar1 --></strong></em></div>
  <article class="content">
    <h1>Please Log In ...</h1>
    <section>
      <hr >
      <form action="<?php echo $loginFormAction; ?>" method="POST" name="login" id="login">
      <table width="600" border="0">
        <tr>
          <th height="45" scope="row">Username</th>
          <td><input name="userid" type="text" id="userid" value=""></td>
        </tr>
        <tr>
          <th height="56" scope="row">Password</th>
          <td><input name="password" type="password" id="password" value=""></td>
        </tr>
      </table>
      <p><font color="#FF0000" size="-1">
        <?php
		if($_GET['var']==1)
         echo "Wrong username or password ....please try again."
		?></font></p>

    <p align="center">
      <input type="submit" name="login" id="login" value="Login">
    </p>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </section>
    <section></section>
  <section> </section></article>
  <footer>
    <p>This is the official site of Online Metro Railway  Tickets (OMRT)</p>
  </footer>
<h6><!-- end .container --></h6></div>
</body>
</html>
<?php
mysql_free_result($Login);
?>
