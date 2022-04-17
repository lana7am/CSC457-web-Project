<?php
require('config.php');
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>

    <link href="css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

</head>
<body>
	
 	<div>
    <?php
   
    if(isset($_POST['login'])){
    	if(isset($_POST["email"]) && isset($_POST["pw"]) && !empty($_POST["email"]) && !empty($_POST["pw"])){
    		$email=$_POST['email'];
		    $pw=$_POST['pw'];

		    $sql = "SELECT name,email,password FROM customers WHERE email='$email'";
		    $result = $conn->query($sql);

	      if($result->num_rows > 0){
	      	$row = $result->fetch_assoc();
	      	if($row['password'] == $pw){
	      		$_SESSION['name']=$row['name'];
	      		header('location: home.php');
	      		exit;

	      	}else{
	      		$_SESSION['msg']="incorrect password";
	      		
	      	}
	      }else{
	      	$_SESSION['msg']="This email is not registered";
	        }
    	}else{

    		$_SESSION['msg']="please fill all the fields";
    	}
    	header('location: index.php');
	    exit;
    }
    ?>
  </div>
  <div class="login-wrap">
	<div class="login-html">
			<h1>log in</h1>
			
	<form action="index.php" method="post">

	<div class="group">
		<label for='email'>Email</label>
		<input type="text"  name="email" id='email' placeholder="Enter email" required>
	    <label for='pw'>Password</label>
        <input type="Password"  name="pw" id='pw' placeholder="Enter password" required>
        <input type="submit" class="button" name="login" value="login" id="login">
        <button id="register">Register</button>
        <div class="error_msg">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);

      }
   
    ?>
  </div>
  <div id="e" class="error_msg"></div>
</div>
	</form>

</div>
</div>
	<script type="text/javascript">
		var btn = document.getElementById('register');
		btn.addEventListener('click', function() {
		  document.location.href = 'register.php';
		});
		document.getElementById("login").addEventListener("click", function(event){
			var valid = true;
			if(document.getElementById("pw").value==="" || document.getElementById("pw").value.trim().length === 0 ||document.getElementById("email").value==="" || document.getElementById("email").value.trim().length === 0){
				valid = false;
				event.preventDefault();
				document.getElementById("e").innerHTML="Plase fill all the fields";
			}

		    
		});
	</script>
</body>
</html>