<!DOCTYPE html>
<html lang="en">
<head>
<style>
body{
	font: 14px sans-serif;
	background-color: #333;
}

#apDiv1 {
position: absolute;
width: 1645px;
height: 75px;
z-index: 1;
color: #39F;
background-color: #660066;
top: 1px;
left: 1px;
border: 3px solid gray;
padding: 10px;
}
#apDiv2 {
position: absolute;
width: 134px;
height: 54px;
z-index: 2;
left: 1224px;
top: 7px;
color: #F00;
text-align: center;
border: 3px;
padding: 10px;
}
#apDiv3 {
position: absolute;
width: 138px;
height: 54px;
z-index: 2;
left: 1385px;
top: 7px;
color: #000;
text-align: center;
font-weight: bold;
border: 3px solid black;
padding: 10px;
}

#apDiv1 #apDiv2 h3 a {
color: #0F0;
}
#apDiv1 #apDiv3 h3 a {
color: #F00;
}
.justified {
	text-align: justify;
}

#apDiv4 {
	position: absolute;
	left: 281px;
	top: 28px;
	width: 631px;
	height: 36px;
	z-index: 2;
	
}

</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
#apDiv5 {
	position: absolute;
	left: 63px;
	top: 112px;
	width: 1208px;
	height: 731px;
	z-index: 3;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<meta charset="utf-8">
</head>

<body>
<div id="apDiv4">
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a href="Dashboard.php">Dashboard</a></li>
    <li><a href="Report.php">Report</a></li>
    <li><a  href="Story.php">Story</a></li>
  </ul>
</div>
<div id="apDiv5">
<iframe src="https://us3.ca.analytics.ibm.com/bi/?perspective=story&amp;pathRef=.my_folders%2FStory&amp;closeWindowOnLastView=true&amp;ui_appbar=false&amp;ui_navbar=false&amp;shareMode=embedded&amp;action=view&amp;sceneId=model00000184744a68d7_00000001&amp;sceneTime=0" width="1200" height="650" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe></div>
<a href="home.php"></a>
<div id="apDiv1">
<h1><a href="home.php"><span style="width: 100px; height: 100px; font-size: 36px; color: #F0F; font-family: 'Times New Roman', Times, serif;"><strong> Home</strong></span></a> </h1>

<div id="apDiv2">
<h3><a href="Login.php">Sign in</a></h3></div>
<div id="apDiv3">
<h3> <a href="Register.php">Sign up</a></h3>
</div>
</div><br><br><br><br><br><br>
</body>
</html>