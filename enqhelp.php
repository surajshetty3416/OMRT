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
      <li><em><strong><a href="index.php">Home</a></strong></em></li>
      <li><em><strong><a href="login.php">Login</a></strong></em></li>
      <li><em><strong><a href="map.php">Map</a></strong></em></li>
      <li><em><strong><a href="notification.php">Notification</a></strong></em></li>
      <li><em><strong><a href="enqhelp.php">Enquiry/help</a></strong></em></li>
      <li><em><strong><a href="about.php">About</a></strong></em></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Enquiry / Help</h1>
    <section>
      <hr >
      <form action="<?php echo $editFormAction; ?>" method="POST" name="register" id="register2">
        <p><strong>FAQs: </strong> </p>
        <p><strong>Q:What do I need to get E-ticket?</strong><br>
          <strong>Ans:</strong>1.You need to have aadhar card as you need to provide its UID during your registration to OMRT.<br>
        2.You must have a mobile device with internet and multimedia enabled so as to download E-ticket and validate it at stations.</p>
        <p><strong>Q:How to get E-ticket ?</strong><br>
        <strong>Ans:</strong>Firstly you have to login to OMRT then select the destination i.e. from and to.</p>
        <p><strong>Q:What Stations will the OMRT system cover?</strong><br>
          <strong>Ans:</strong>Currently OMRT has the backup for stations from Kalyan junction to CST (central railway).Both up and down journey between these stations are available.</p>
        <p><strong>Q:How can I pay for E-Tickets?</strong><br>
          <strong>Ans:</strong> You can pay for E-ticket using your E-wallet provided by OMRT system or third party internet banking system.</p>
        <p><strong>Q:What is E-Wallet?<br>
        Ans:</strong>E-wallet is the sevice provided by OMRT system through which you can pay for your E-Tickets and refill account accordingly.</p>
        <p>&nbsp;</p>
      </form>
    </section>
    <h1>&nbsp;</h1>
    <section>
      <hr>
      <form action="<?php echo $editFormAction; ?>" method="POST" name="register" id="register">
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