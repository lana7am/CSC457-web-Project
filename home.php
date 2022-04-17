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
	<title>Home</title>
	<link rel="stylesheet" href="tooplate-style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  

    <title>Bookstore Products</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/home.css">

</head>
<body>

	 <!-- ADD A PRELOADER FOR FUN -->

	<!-- NAVIGATORS, DELETE IF NO NEED, but we can add log out button or shopping cart -->
	  <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container background">
          <a class="navbar-brand" href="home.php"><h2>BOOK<em>STORE</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="products.html">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- NAVIGATORS, DELETE IF NO NEED -->
    
    
        
        <script src="banner.js"></script>


	    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Home Page</h4>
              <h2><?php
		echo "<em> Hello ". $_SESSION['name']."</em>";

		?></h2>
      <body>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="carousel/3.png" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="carousel/1.png" width="1100" height="500">
    </div>
    <div class="carousel-item">
       <img src="carousel/2.png"width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</body>
               
               
            </div>
          </div>
        </div>
      </div>
    </div>
 
	 <div class="tm-main-content">
                <section class="tm-margin-b-l"> 
	<div class="tm-gallery">
		<h3> Products </h3> <br/>
		<div class="row">

			<?php
			$sql = "SELECT * FROM books WHERE quantity>'0'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = mysqli_fetch_assoc($result)) {
					
					$_SESSION['ISBN'] = $row["ISBN"];
				    echo "<figure class=\"col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item\"> <a href=\"product.php?ISBN=".$row["ISBN"]."\"> <div class=\"tm-gallery-item-overlay\"><img src=\"images/" . $row["cover"]. "\" class=\"img-fluid tm-img-center\"> </div> <p class=\"tm-figcaption\"> " . $row["name"]. " - SR" . $row["price"]. " </p></a></figure>" ;
   			

				}
			}else{echo "sorry no available books";}

			?>
		</div>

	</div> 
</section>
</div>

<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p> All Copyrights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


</body>
</html>