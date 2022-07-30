<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./ind.php");
    exit;
}
 
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_error = $password_error = $login_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_error) && empty($password_error)){
        // Prepare a select statement
        $sql = "SELECT Userid, username, password FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
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
                            $_SESSION["Userid"] = $id;
                            $_SESSION["username"] = $username;                            
                           
                            
                            // Redirect user to welcome page
                            header("location: ./ind.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_error = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_error = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Login</title>
	
	 <meta charset="UTF-8">
     <meta name="viewport" content= "width=device-width,initial-scale=1">
	 <link rel="stylesheet" href="fa.css">
	 
	 <link rel="stylesheet" href="login.css" type="text/css">
	
	 <link rel="stylesheet" href="design.css">
  </head>
  <body style="background-color:#1F2833;"><!--come on it is basic, a body tag-->	 
	 <!--header file-->
	 <header style="background-color:#0B0C10;">
	     <div class="float-parent-element">
	     <div class="float-child-element">
		 <div id="mySidenav" class="sidenav"> <!--side navigation-->
			     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> <!--close button for side navigation-->
		         <li><a href="#">HomePage</a></li> <!--Home page that will lead to homepage-->
			     <li><a href="">Store</a></li> <!--It will lead to store which is still in construction-->
			     <li><a href="">About</a></li> <!--under construction-->
			     <li><a href="help/Help.html">Help & Support</a></li> <!--Under construction-->
			     <li>
				 <?php if(isset($_SESSION["loggedin"])):?>
				 <a href="logout.php">Logout</a>
				 <?php else:?>
				 <a href="login.php"><i>Login</i></a>
				 <?php endif;?>
				 </li> <!--To check if user is logged in if user is logged in put log out otherwise put login button.-->
             </div><!--end of side navigation-->
		 </div>		 
	     
		 
	     <div id="main">
		     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> <!--navigaiton open button-->
         </div>
		 </div>
     </header> <!--header end-->	
     
	 <div class="topnav" style="background-color:#45A29E;"><!--probably not necessary but here it is.-->
	     <div style="padding-right:50px;">
		 <div style="border-style:solid; border-width:1px; padding:10px;  background-color:#66FCF1;">
	     <a class="active" href="Main.html" style="border-style:hidden; border-width:2px; padding:2px;">Home</a>
		 <a href="" style="border-style:hidden; border-width:2px; padding:2px; padding-left:5px;">News</a>
		 <a href="" style="border-style:hidden; border-width:2px; padding:2px; padding-left:5px;">Contact</a>
		 <a href="" style="border-style:hidden; border-width:2px; padding:2px; padding-left:5px;">About us</a>
		 <a href="Help.html" style="border-style:hidden; border-width:2px; padding:2px; padding-left:5px;">Help and support</a>
		 </div>
		 </div>
	</div>
     	
	 <section>
     <div style="padding-top:50px; margin-left: auto; margin-right: auto; width: 400px;">
	 <div style="border-style:solid; border-width:1px; border-color:white; background-color:#4dc3ff;">
	     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		 <div class="imgcontainer">
             <img src="avatar.png" alt="Avatar" class="avatar">
         </div>
         <?php 
        if(!empty($login_error)){
            echo '<div class="alert alert-danger">' . $login_error . '</div>';
        }        
        ?><!--This show if there is any error while logging in-->
         <div class="container">
             <label><b style="color:white;">Username</b></label>
             <input type="text" name="username" class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"><!--get username from user and search if it exist in database to load it-->
             <span class="invalid-feedback"><?php echo $username_error; ?></span>

             <label><b style="color:white;">Password</b></label>
             <input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>">
			 <!--get password from user and check if the password match with the username in database to load login-->
             <span class="invalid-feedback"><?php echo $password_error; ?></span>
             <div>
             <label>
                 <input type="checkbox" checked="checked" name="remember"><i style="color:white;">Remember me</i></input>
             </label>
			 <br>
            <button type="submit">Login</button><br>
             <span style="color:white;">Forgot <a href="#">password?</a></span><br><!--There is no way to get back account for now-->
			 <span style="color:white;"><a href="register.php">Don't have account?</a></span><!--a way to go to register.php-->
		 </div>
         </form>
	 </div>
	 </div>
	 </div>
	 </section>
     </body>
    </html>