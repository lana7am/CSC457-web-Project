<?php
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
//NEED TO BE DISCUSSED
 require('config.php');
    // if(!isset($_SESSION['home'])){
    //     echo "You Have To Sign In First";
    //     echo "<a href='index.php'> Login</a>.";
    //     die();
    // }

  ?> 


 
  <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="tooplate-style.css">
    <meta charset="UTF-8">
    <title><?php echo $row["name"]?></title>
</head>
<body>
     <script >
      var quantity = "<?php Print($row["quantity"]); ?>";
    if(quantity<5){
        document.getElementById("LowInStock").style.visibility = "visible";
    }
    else
    { document.getElementById("LowInStock").style.visibility = "hidden";
    }
</script>

<?php

if(isset($_GET["ISBN"])){
$ISBN =preg_replace('#[^0-9]#i',"", $_GET['ISBN']);
    //$ISBN=$_GET['ISBN'] ;
    echo $ISBN;
// use this ID to check if its exist in DB
// if no exit
$query= "SELECT * FROM books WHERE ISBN = '$ISBN' LIMIT 1";
$book = $conn->query($query);
    $bookCount = mysqli_num_rows($book);
if($bookCount>0){
    //get book details
    while($row = mysqli_fetch_array($book)){
        // $bookName=$row["name"];
        // $price=$row["price"];
        // $cover=$row["cover"];
        // $quantity=$row["quantity"];
        // $description=$row["description"];

         echo '<img src=images/' . $row["cover"] .' ">
    <h2>' . $row["name"]. '</h2>

    <p> Price:'.$row["price"] .'SR<span id="LowInStock"> (Low in Stock! Only '. $row["quantity"] .' left)</span></p>
    A breif description:
    <p>' . $row["description"].'</p>
    <input type="number" id="quantity" name="quantity" min="1" max="' . $row["quantity"] .'">
    <button type="button">Add to Cart</button>';

    }


}
else{
     echo"No book in the system with this ISBN";
    exit();
}

} else{
    echo"No book in the system with this ISBN";
    exit();
}
//mysqli_close($conn);
?>


       
</body>
</html>
    
