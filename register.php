<?php
require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Regiesteration</title>
  <link href="css/login.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
</head>
<body>
  <div>
    <?php
    if(isset($_POST['register'])){
    $email=$_POST['email'];
    $name=$_POST['name'];
    $pw=$_POST['pw'];
    $cpw=$_POST['cpw'];
    if((strcmp($pw, $cpw) !== 0) ){
      $_SESSION['msg']= "passwords dont match";
    }else{

      $sql = "SELECT email FROM customers WHERE email='$email'";
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        $_SESSION['msg']= "This eamil is already registered";
      }else{
        $sql="INSERT INTO customers (name,email,password) VALUES ('$name','$email','$pw')";
        $result = $conn->query($sql);
        if($result){
          header('Location: index.php');
        }
    }
    }

  }
    ?>
  </div>
  <div class="login-wrap">
  <div class="login-html">
<form action="register.php" method="post">
  <h1>Sign Up</h1>
  <div class="group">
  <label for='name'>Name</label>
  <input type="text" name="name" id='name' placeholder="Enter name" required>
  <label for='email'>Email</label>
  <input type="text" name="email" id='email' placeholder="Enter email" required>
  <label for='pw'>Password</label>
  <input type="Password" name="pw" id='pw' placeholder="Enter password" required>
  <label for='cpw'> Confirm Password</label>
  <input type="Password" name="cpw" id='cpw' placeholder="Confirm password" required>
  <input type="submit" class="button" id="register" name="register" value="Regiester">
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
  
  document.getElementById("register").addEventListener("click", function(event){
      var valid =true;
      if(document.getElementById("pw").value==="" || document.getElementById("pw").value.trim().length === 0 ||document.getElementById("email").value==="" || document.getElementById("email").value.trim().length === 0 || document.getElementById("cpw").value==="" || document.getElementById("cpw").value.trim().length === 0 || document.getElementById("name").value==="" || document.getElementById("name").value.trim().length === 0){
        document.getElementById("e").innerHTML="plase fill all the fields";
        valid=false;

      }
      if(document.getElementById("cpw").value !==document.getElementById("pw").value){
        document.getElementById("e").innerHTML="PW do not match";
        valid=false;
      }
      if(!valid){
        event.preventDefault();
      }  
    });
</script>
</body>
</html>