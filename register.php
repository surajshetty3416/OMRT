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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "register")) {
  $insertSQL = sprintf("INSERT INTO omrtdb (`uid`, username, password) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['UID'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "login.php?var=0";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_register = "SELECT * FROM omrtdb";
$register = mysql_query($query_register, $localhost) or die(mysql_error());
$row_register = mysql_fetch_assoc($register);
$totalRows_register = mysql_num_rows($register);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>OMRT</title>
<link href="css/main.css" rel="stylesheet" type="text/css">

<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="css/button1.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
</head>

<body>

<div class="container">
  <header><a href="index.php" class="clearfloat"><img src="lodtitle.png" width="961" height="210" alt="titlelogo"></a> </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="notification.php">Notificaton</a></strong></em></li>
      <li><em><strong><a href="enqhelp.php">Enquiry/help</a></strong></em></li>
      <li><em><strong><a href="loginadmin.php?var=0">Admin Panel</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a></strong></em> </li>
    </ul>
    <ul class="nav">
      <li></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Registration</h1>
    <section>
      <hr >
        <form action="<?php echo $editFormAction; ?>" method="POST" name="register" target="_parent" id="register">
        <table width="600" border="0">
          <tr>
            <th width="176" scope="row">Enter  Aadhar UID :</th>
            <td width="414"><span id="sprytextfield1">
              <label for="UID"></label>
              <span id="sprytextfield4">
              <input type="text" name="UID" id="UID">
              <span class="textfieldRequiredMsg">Please enter UID.</span><span class="textfieldInvalidFormatMsg">Invalid UID </span><span class="textfieldMinCharsMsg">Invalid UID.</span><span class="textfieldMaxCharsMsg">Invalid UID.</span></span></span></td>
          </tr>
          <tr>
            <th height="27" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th scope="row">User Name :</th>
            <td><span id="sprytextfield2">
              <label for="username"></label>
              <span id="sprytextfield5">
              <input name="username" type="text" id="username" maxlength="32">
              <span class="textfieldRequiredMsg">Please provide a Username.</span></span></span></td>
          </tr>
          <tr>
            <th height="29" scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th height="29" scope="row">Password   :</th>
            <td><span id="sprytextfield3">
              <label for="password"></label>
              <span id="sprypassword1">
              <input name="password" type="password" id="password" maxlength="32">
              <span class="passwordRequiredMsg">Please enter password.</span><span class="passwordMinCharsMsg">Password should be min. of 6 chars.</span><span class="passwordMaxCharsMsg">Password should be less than 20 chars.</span></span></span></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th height="50" scope="row">&nbsp;</th>
            <td><input type="submit" name="register" id="register" value="Register"></td>
          </tr>
          <tr>
            <th height="49" scope="row">&nbsp;</th>
            <td><font color="#0000CC" size="-1"><a href="login.php?var=0" id="login">have account ? login</a>&nbsp;</font></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="register">
      </form>
    </section>
    <h1>&nbsp;</h1>
    <section> </section>
  <!-- end .content --></article>
  <footer>
  <p>This is the official site of Online Metro Railway  Tickets (OMRT)</p></footer>
  <!-- end .container --></div>
<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {minChars:12, maxChars:12});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:6, maxChars:15});
</script>
</body>
</html>
<?php
mysql_free_result($register);
?>
