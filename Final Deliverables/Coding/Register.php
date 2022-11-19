<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $email =  $password = $confirm_password = "";
$username_err =  $email_err =$password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";     
    
    } else{
        $email = trim($_POST["email"]);
    }

    

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err)  && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username,email, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email    = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: Success.php");
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
    <title>Sign Up</title>
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
	background-image: url(rail.jpg);
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
	color: #0F0;  
}
  
    </style>
</head>
<body>

<div id="apDiv1">
  <h1><a href="home.php"><span style="width: 100px; height: 100px; font-size: 36px; color: #F0F; font-family: 'Times New Roman', Times, serif;"><strong> Home</strong></span></a>        </h1>
  <div id="apDiv2">
    <h3><a href="Login.php">Sign in</a></h3></div>
    <div id="apDiv3">
      <h3> <a href="Register.php">Sign up</a></h3>
    </div>
  
</div><br><br><br><br><br><br><br>

    <div class="center">
      <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group">
                 <label>Email Address</label>
                 <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                 <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
 
            <div class="form-group"></div>
  
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="Login.php">Login here</a>.</p>
           
        </form>
</div>    
</body>
</html>