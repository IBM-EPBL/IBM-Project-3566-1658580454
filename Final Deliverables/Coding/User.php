<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
<style>
       body{ font: 14px sans-serif; }
        
    


    #apDiv1 {
	position: absolute;
	width: 1645px;
	height: 75px;
	z-index: 1;
	color: #39F;
	background-color: #660066;
	top: 3px;
	left: 1px;
	border: 3px solid gray;
	padding: 10px;
}
    #apDiv2 {
	position: absolute;
	width: 134px;
	height: 54px;
	z-index: 2;
	left: 1313px;
	top: 11px;
	color: #F00;
	text-align: center;
	border: 3px;
	padding: 10px;
}

    #apDiv1 #apDiv2 h3 a {
	color: ##F00;
}
 
      


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}


</style>

<body>
<div id="apDiv1">
  <h1><span style="width: 100px; height: 100px; font-size: 36px; color: #F0F; font-family: 'Times New Roman', Times, serif;"><strong>User Dashboard</strong></span></h1>
  <div id="apDiv2">
    <h3><a href="Logout.php">Sign out</a></h3></div>
</div><br><br><br><br><br><br>
<div id="apDiv6">
  <ul>
    <li><a class="active">DashBoard Tools</a>
      <ul>
        <li><a href="https://us3.ca.analytics.ibm.com/bi/?perspective=home">Cognos</a></li>
        
      </ul>
    </li>
  </ul>
</div>
<br>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. <br>Welcome to our site.</h1>
    <p>
        <a href="file:///C|/Users/neera/Desktop/reset.php" class="btn btn-warning">Reset Your Password</a>
       
    </p></div>
</body>
</html>