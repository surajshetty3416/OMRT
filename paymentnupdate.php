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
      <li><em><strong><a href="user.php">Cancel</a></strong></em></li>
      <li></li>
    </ul>
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>&nbsp;</h1>
    <section>
      <form action="final.php" method="POST" name="register" id="register">
        <table width="600" border="1">
          <tr>
            <th height="83" scope="col">Pay via E-Wallet</th>
            <th scope="col">Pay via Internet Banking</th>
          </tr>
          <tr>
            <td height="85" align="center"><label for="ewallet"></label>
            <input type="radio" name="radio" id="ewallet" value="E-Wallet"></td>
            <td align="center"><input type="radio" name="radio" id="internetbank" value="Internet Banking">
            <label for="internetbank"></label></td>
          </tr>
        </table>
        <center> 
          <p>&nbsp;</p>
          <p>
            <input type="submit" name="proceed" id="proceed" value="Get E-ticket">
          </p>
        </center>
        <p>&nbsp; </p>
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