<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: User.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: User.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        
    
.center {
	margin: auto;
	width: 500px;
	border: 3px solid blue;
	padding: 10px;
	font-size: 14px;
	opacity: 0.9;
	background-color: gray;
	
}

body {
	background-image: url(rail1.jpg);
    background-size: cover;

	
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
	height: 55px;
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
a{
	color: #F00;  
}
    </style>
</head>
<body>
<a href="home.php"></a>
<div id="apDiv1">
  <h1><a href="home.php"><span style="width: 100px; height: 100px; font-size: 36px; color: #F0F; font-family: 'Times New Roman', Times, serif;"><strong> Home</strong></span></a>        </h1>
  <div id="apDiv2">
    <h3><a href="Login.php">Sign in</a></h3></div>
    <div id="apDiv3">
      <h3> <a href="Register.php">Sign up</a></h3>
    </div>
  
</div>
<a href="home.php">
<H1 style="width:100px;height:100px;">&nbsp;</H1>
</a>
 <div class="center">
   <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="Register.php">Sign up now</a>.</p>
           </form>
          </div>  
        
</body>
</html>