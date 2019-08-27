<?php 
require'common.php';
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if(isset($_GET['id']) && in_array($_GET['id'], $_SESSION['cart'])){ /*daca avem un id si id ul exista in array ul de la sesion cart*/
    $varid = $_GET['id'];
    $ses = $_SESSION['cart'];
      if(($item = array_search($varid, $ses)) !== false) {  
        unset($ses[$item]); //in sesiune caut ceva ce e in item        
    }
    $_SESSION['cart'] = array_values($ses); /* Folosim valorile ca array nu ca obiect  */
 }

 if(isset($_GET['id']) && in_array($_GET['id'], $_SESSION['cart'])) {
     $varid = $_GET['id'];
     $ses = $_SESSION['cart'];
 }


// verific daca id urile nu exista in sesiune comparativ cu baza de date
$query = "SELECT * FROM products";
// verificare id uri cart
 
    $query .= " WHERE id IN (". implode(', ', array_values($_SESSION['cart'])).")";
 
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
            <a href="cart.php?id=<?php echo $products['id'];?>">Remove</a>
        </div>
       
    </div>

</div>
<?php 
    }
}
}
?>
</div>
</div>
<a href="index.php">Go to shop</a>
</body>
</html>





