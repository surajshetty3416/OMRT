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
$query_userpanel = "SELECT * FROM omrtdb";
$userpanel = mysql_query($query_userpanel, $localhost) or die(mysql_error());
$row_userpanel = mysql_fetch_assoc($userpanel);
$totalRows_userpanel = mysql_num_rows($userpanel);
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
  <header><a href="index.php" class="clearfloat"><img src="lodtitle.png" width="961" height="210" alt="titlelogo"></a> </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><em><strong><a href="login.php?var=0">Login</a></strong></em></li>
      <li><em><strong><a href="register.php">Registration</a></strong></em></li>
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="enqhelp.php">Enquiry/help</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a></strong></em></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>User Panel</h1>
    <section>
      <hr>
      <form action="<?php echo $editFormAction; ?>" method="POST" name="register" id="register">
        <table width="600" border="0">
          <tr>
            <th scope="row">UID</th>
            <td><?php echo $row_userpanel['uid']; ?></td>
          </tr>
          <tr>
            <th scope="row">Username</th>
            <td><?php echo $row_userpanel['username']; ?></td>
          </tr>
          <tr>
            <th scope="row">Password</th>
            <td><?php echo $row_userpanel['password']; ?></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>
        <ol>
          </p>
        </ol>
        <p>&nbsp;</p>
      </form>
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
mysql_free_result($userpanel);
?>
