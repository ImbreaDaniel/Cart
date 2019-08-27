<?php 
require'common.php';
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if(isset($_GET['id'])){
    $_SESSION['cart'][] = $_GET['id']; /* am salvat id ul in sesiune*/
}
// verific daca id urile nu exista in sesiune comparativ cu baza de date
$query = "SELECT * FROM products";
// verificare id uri cart
 if(count($_SESSION['cart'])) {
    $query .= " WHERE id NOT IN (". implode(', ', array_values($_SESSION['cart'])).")";
 }


$result = mysqli_query($connect, $query);
if($result) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<a href  = "login.php" class="btn btn-primary ml-5">Login</a>
<div class="container-fluid">
<div class="row">
    <?php 
if(mysqli_num_rows($result)>0) {
  while ($products = mysqli_fetch_assoc($result)){
?>
<div class="col-md-12"> 
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <img class="" src="images/<?php echo $products['id'];?>.jpg">
            </div>
        <div>
            <h2><?php echo $products['title'];?><h2>
            <h2><?php echo $products['description'];?></h2>
            <h2>$<?php echo $products['price'];?></h2>
            <a href="index.php?id=<?php echo $products['id'];?>">Add to cart</a>
        </div>
        </div>
  </div>

</div>
<?php 
    }
}
}
?>
<a href="cart.php">Go to cart</a>


</div>
</div>
</body>
</html>