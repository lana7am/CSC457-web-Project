<?php
   // Include config file
	require("config.php");
	session_start();
    if(isset($_POST['submit'])){
    	if(isset($_POST["username"]) && isset($_POST["pass"]) && !empty($_POST["username"]) && !empty($_POST["pass"])){
    		$username=$_POST['username'];
		    $pass=$_POST['pass'];

		    $sql = "SELECT * FROM admins WHERE username = \"$username\"";

		    $result = $conn->query($sql);

	      if($result->num_rows > 0){
	      	$row = $result->fetch_assoc();
	      	if(password_verify($pass, $row['password'])){
	      		$_SESSION['username']=$row['username'];
	      		header('Location:dashboard.php');
	      		exit;

	      	}else{
	      		$_SESSION['msg']="incorrect password";
	      		
	      	}
	      } else{
	      	$_SESSION['msg']="Wrong admin credentials!";
	        }
    	}else{

    		$_SESSION['msg']="please fill all the fields";
    	}
    }
    ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Log In</title>

    <link href="css/adminLogIn.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
</head>
<body>
	<div class="login-wrap">
	<div class="login-html">
<h1>Admin Log In</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div class="group">
		<!-- GET should NEVER be used for sending passwords or other sensitive information! -->
<label for='username'>Username</label>
<input type="text" name="username"  placeholder="Your Username" id="username" required>
<label for='pass'>Password</label>
<input type="password" name="pass"  placeholder="Your Password" id="pass" required>
<input type="submit" name="submit" value="Log In" class="button">
 <div class="error_msg">
    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);

      }
   
    ?>
  </div>
</div>
</form>
</div>
</div>

</body>
	</html>
	
