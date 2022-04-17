<!DOCTYPE html>
<?php
    
    session_start();

    if(isset($_POST['submit'])){
    if(isset($_POST["ISBN"]) &&
       isset($_POST["name"]) &&
       isset($_POST["price"]) &&
       isset($_POST["quantity"]) &&
       isset($_POST["description"]) &&
       isset($_POST["cover"])){
        
    $ISBN = $_POST['ISBN'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
    $cover   = trim($_POST['cover']);

	// Database connection
	 require('config.php');
		$stmt = $conn->prepare("insert into Books(ISBN,name, price, quantity, description,cover) values(?,?, ?, ?, ?,?)");
		$stmt->bind_param("ssssss", $ISBN, $name, $price, $quantity, $description,$cover);
		if($stmt->execute()){
            echo "Registration successfully...";
		$stmt->close();
		$conn->close();
        header('Location:dashboard.php');
        exit;
        }else{
            $_SESSION['msg']="an error occurred"; 
        }
    
		
    } else {
    $_SESSION['msg']="please fill all the fields";        
    }
    }
?>

<html>
  <head>
    <title>Add a new book</title>
    
    <link href="css/adminLogIn.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="login-wrap-addproduct">
  <div class="login-html">
          <div class="panel-heading text-center">
            <h1>Add a new book</h1>
          </div>
          <div class="panel-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="group">
              <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input
                  type="text"
                  class="form-control"
                  id="ISBN"
                  name="ISBN"
                />
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                />
              </div>
              <div class="form-group">
                <label for="price">price</label>
                <input
                  type="number"
                  class="form-control"
                  id="price"
                  name="price"
                />
              </div>
              <div class="form-group">
                <label for="quantity">quantity</label>
                <input
                  type="number"
                  class="form-control"
                  id="quantity"
                  name="quantity"
                />
              </div>
              <div class="form-group">
                <label for="textarea">Description</label>
                  <textarea id="description" name="description"
                            class="form-control"
          rows="6" cols="38">

</textarea>
                
              </div>
                <div class="form-group">  
                  <label for="cover">Cover</label>
						<input type='file' id= cover name='cover' size='35'>
						
             </div>
              
              <input type="submit" class="button" />
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
         </div>
  </div>  
  </body>



    </html>