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
body,td,th {
	color: #FFF;
}
.justified {
	font-size: 18px;
}
.justified .justified {
	font-size: 18px;
}
#apDiv5 {
	position: absolute;
	left: 190px;
	top: 651px;
	width: 1359px;
	height: 142px;
	z-index: 3;
}
#apDiv6 {
	position: absolute;
	left: 199px;
	top: 642px;
	width: 305px;
	height: 46px;
	z-index: 3;
	font-size: 36px;
}
#apDiv7 {
	position: absolute;
	left: 203px;
	top: 713px;
	width: 913px;
	height: 82px;
	z-index: 4;
	font-size: 24px;
	border: 3px solid black;
	padding: 10px;	
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

<div id="apDiv6">Team Members:</div>
<div id="apDiv7">
<p>Neerajj.S  &nbsp; Pranav Pandy  &nbsp;  A.S Nanthu D.J &nbsp; Prashanth</p></div>
<a href="home.php"></a>
<div id="apDiv1">
<h1><a href="home.php"><span style="width: 100px; height: 100px; font-size: 36px; color: #F0F; font-family: 'Times New Roman', Times, serif;"><strong> Home</strong></span></a> </h1>

<div id="apDiv2">
<h3><a href="Login.php">Sign in</a></h3></div>
<div id="apDiv3">
<h3> <a href="Register.php">Sign up</a></h3>
</div>
</div><br><br><br><br><br><br><br>
<div style="margin-left: 10%; padding: 1px 16px; height: 1000px; font-size: 36px; font-weight: bold;">
<p >About:</p>
<p class="justified"><span class="justified">The Indian Railways has a capital base of about Rs. 100000 crores and is often referred to as the lifeline of the Indian economy because of its predominance in transportation of bulk freight and long distance passenger traffic. The network criss-crosses the nation, binding it together by ferrying freight and passengers across the length and breadth of the country. As the Indian economy moves into a high growth trajectory the Railways have also stepped-up developmental efforts and are preparing themselves for an even bigger role in the future.</span></p>
<p class="justified"><br>
  
  Technical Architecture:<br><br><br>
  
  • To regain some of the market, it has lost over past decades and regain market share in some commodities and overcome the challenges and to maintain sustainable growth in all its commodities.<br><br>
  
  • Reducing the congestion on rail corridors and improving port connectivity.<br><br>
  
  • The development of two Dedicated Freight Corridors a cross key ports
  </p>
</p>

</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>