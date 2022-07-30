<?php
session_start();
?>
<?php include "header.php";?>

  </head>
  <body style="background-color:#1F2833;"><!--come on it is basic, a body tag-->	 
	 <!--header file-->
	 <header style="background-color:#0B0C10;">
	     <div class="float-parent-element">
	     <div class="float-child-element">
		 <div id="mySidenav" class="sidenav"> <!--side navigation-->
			     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> <!--close button for side navigation-->
			     <li>
				 <?php if(isset($_SESSION["loggedin"])):?>
				 <a href="./logout.php">Logout</a>
				 <?php else:?>
				 <a href="./login.php"><i>Login</i></a>
				 <?php endif;?>
				 </li> <!--To check if user is logged in if user is logged in put log out otherwise put login button.-->
             </div><!--end of side navigation-->
		 </div>
		 <div style="float:right;  font-color:white; padding-top:20px; padding-right:10px;;">
		 <form action="User/profile.php">
		     <button type="submit"><img style="padding-right:5px;" src="User/avatar.png" width="40px" height="40px"><?php if(isset($_SESSION['loggedin'])){ echo $_SESSION['username'];}else{ echo "Guest";}?></button></form><!--if the user is logged in put username in the box if not put guest-->
		 </div>
		 
	   
		 
	     <div id="main">
		     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> <!--navigaiton open button-->
         </div>
		 </div>
     </header> <!--header end-->	
     
	 <div class="topnav" style="background-color:#45A29E;"><!--probably not necessary but here it is.-->
	     <div style="padding-right:50px;">
		 <div style="border-style:solid; border-width:1px; padding:10px;  background-color:#66FCF1;">
	     <a class="active" href="Main.html" style="border-style:solid; border-width:1px; padding:2px;">Home</a>
		 <a href="" style="border-style:solid; border-width:1px; padding:2px; padding-left:5px;">News</a>
		 <a href="" style="border-style:solid; border-width:1px; padding:2px; padding-left:5px;">Contact</a>
		 <a href="" style="border-style:solid; border-width:1px; padding:2px; padding-left:5px;">About us</a>
		 <a href="Help.html" style="border-style:solid; border-width:1px; padding:2px; padding-left:5px;">Help and support</a>

		 <div style="float:right; padding-right:10px;">
		     <form>
			     <input type="text" placeholder="Search" name="search"><!--Search bar but still under construction-->
				 <button type="submit"><i class="fa fa-search"></i></button>
			 </form>
		 </div>
		 </div>
		 </div>

  </body>
</html>