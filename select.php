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
$query_index = "SELECT * FROM omrtdb";
$index = mysql_query($query_index, $localhost) or die(mysql_error());
$row_index = mysql_fetch_assoc($index);
$totalRows_index = mysql_num_rows($index);
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
      <li><em><strong><a href="login.php?var=0">Login</a></strong></em></li>
      <li><em><strong><a href="register.php">Registration</a></strong></em></li>
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="notification.php">Notificaton</a></strong></em></li>
      <li><em><strong><a href="enqhelp.php">Enquiry/help</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a></strong></em></li>
      <li></li>
    </ul>
  <em><strong><!-- end .sidebar1 --></strong></em></div>
  <article class="content">
    <h1>Get Your E-tickets here </h1>
    <section>
      <hr >
      <form action="check.php" method="post" enctype="multipart/form-data" name="index" id="login">
      <h3><span>
        <label for="fromop">FROM :</label>
        <select name="fromop" size="1" id="fromop" >
          <option value="1" selected="selected">CST</option>
          <option value="2">Masjid</option>
          <option value="3">Sandhurst</option>
          <option value="4">Byculla</option>
          <option value="5">Chinchpokli</option>
          <option value="6">Currey Road</option>
          <option value="7">Parel</option>
          <option value="8">Dadar</option>
          <option value="9">Matunga</option>
          <option value="10">Sion</option>
          <option value="11">Kurla</option>
          <option value="12">Vidyavihar</option>
          <option value="13">Ghatkopar</option>
          <option value="14">Vikhroli</option>
          <option value="15">Kanjurmarg</option>
          <option value="16">Bhandup</option>
          <option value="17">Nahur</option>
          <option value="18">Mulund</option>
          <option value="19">Thane</option>
          <option value="20">Kalwa</option>
          <option value="21">Mumbra</option>
          <option value="22">Diva</option>
          <option value="23">Lower Kopar</option>
          <option value="24">Dombivali</option>
          <option value="25">Thakurli</option>
          <option value="26">Kalyan</option>
        </select>
        <span class="selectRequiredMsg">Please select an item.</span></span></h3>
      <h3><span id="spryselect2">
        <label for="toop">TO :
          <select name="toop" size="1" id="toop">
            <option value="1">CST</option>
            <option value="2">Masjid</option>
            <option value="3">Sandhurst</option>
            <option value="4">Byculla</option>
            <option value="5">Chinchpokli</option>
            <option value="6">Currey Road</option>
            <option value="7">Parel</option>
            <option value="8">Dadar</option>
            <option value="9">Matunga</option>
            <option value="10">Sion</option>
            <option value="11">Kurla</option>
            <option value="12">Vidyavihar</option>
            <option value="13">Ghatkopar</option>
            <option value="14">Vikhroli</option>
            <option value="15">Kanjurmarg</option>
            <option value="16">Bhandup</option>
            <option value="17">Nahur</option>
            <option value="18">Mulund</option>
            <option value="19">Thane</option>
            <option value="20">Kalwa</option>
            <option value="21">Mumbra</option>
            <option value="22">Diva</option>
            <option value="23">Lower Kopar</option>
            <option value="24">Dombivali</option>
            <option value="25">Thakurli</option>
            <option value="26" selected="SELECTED">Kalyan</option>
          </select>
        </label>
   
        <span class="selectRequiredMsg">Please select an item.</span></span></h3>
      <p>&nbsp;</p>
      <p align="center">
        <input type="submit" name="login" id="login" value="Get E-ticket">
</p>
    </form></section>
    <section></section>
  <section><a href="http://www.000webhost.com/" onClick="this.href='http://www.000webhost.com/817404.html'" target="_blank"></a> </section></article>
  <a href="http://www.000webhost.com/" onClick="this.href='http://www.000webhost.com/817404.html'" target="_blank"><img src="http://www.000webhost.com/images/banners/160x600/banner1.gif" alt="Web hosting" width="180" height="600" border="0" /></a>
  <footer>
    <p>This is the official site of Online Metro Railway  Tickets (OMRT)</p>
</footer>
<h6><!-- end .container --></h6></div>
</body>
</html>
<?php
mysql_free_result($index);
?>