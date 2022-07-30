<?php
     //Include database conncting file
	 require_once "database.php";
	 
	 //define variable and initialize with empty values
	 $username = $password = $confirm_password = "";
	 $username_error = $password_error = $confirm_password_error = "";
	 
	 //processing form data when the form is submitted
	 if($_SERVER["REQUEST_METHOD"] == "POST"){
		 
		 // Validate username
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_error = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql= "SELECT Userid FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
          
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_error = "This username is already taken.";
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
		 
		 // Validate password
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_error) && empty($password_error) && empty($confirm_password_error)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
     <title>Register</title>
	 <link rel="icon" type="x-icon">
	 <meta charset="UTF-8">
     <meta name="viewport" content= "width=device-width,initial-scale=1">
	 
	 <link rel="stylesheet" href="login.css" type="text/css">
	 
	 <link rel="stylesheet" href="design.css">
  </head>
  <body>
	 <!--header file-->
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
				 <a href="/logout.php">Logout</a>
				 <?php else:?>
				 <a href="/login.php"><i>Login</i></a>
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
	 <div style="padding-top:50px; margin-left: auto; margin-right: auto; width: 400px">
	 <div style="border-style:solid; border-width:1px; border-color:white;">
	     <form action="register.php" method="post" autocomplete="off">
		 <div class="imgcontainer">
             <img src="avatar.png" alt="Avatar" class="avatar">
         </div>

         <div class="container"><!--container to insert data from user for registration-->
			 <label><b style="color:white;">Username</b></label>
             <input type="text" name="username" class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"><!--There is code attached to find any invalid or existing username.-->
             <span class="invalid-feedback"><?php echo $username_error; ?></span><!--Show problem in this empty space-->

			 <label><b style="color:white;">Password</b></label>
             <input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"><!--There is code attached to it to for any mistakes.-->
             <span class="invalid-feedback"><?php echo $password_error; ?></span><!--Show problem in this empty space-->
			 
			 <label><b style="color:white;">Confirm Password</b></label>
			 <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"><!--There is code attached to it to confirm if password is matching.-->
             <span class="invalid-feedback"><?php echo $confirm_password_error; ?></span><!--Show problem in this empty space-->
             <button type="submit">Register</button><!--submit data entered to sql server-->
             <label>
                 <input type="checkbox" checked="checked" name="remember"> Remember me<!--this button don't work for now-->
             </label>
         </div>
         </form>
     </div>
	 </div>
	 </section>
  </body>
</html>