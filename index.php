<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY price DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body>

  <div class="container">
    <h1>Table of Products</h1>


   
    <table class="table">
  <thead>
    <tr class="table">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  foreach($products as $x=>$product):  ?>
 <tr>
      <th scope="row"><?php echo $x + 1 ?></th>
      <td><?php  echo $product['title'];?></td>
      <td><?php  echo $product['price'];?></td>
      <td><?php  echo $product['img'] ?></td>
      <td><?php  echo $product['create_date'] ?></td>
       <td>

    <!--Delete button based on id--->
       <form style= "display:inline-block"  method="post" action="delete.php">
       <input type="hidden" name='id' value=" <?php echo $product['id']; ?>">
       <button type="submit" class="btn btn-outline-danger">Delete</button>
       </form>
       </td>
    </tr>

 <?php endforeach; ?>
  </tbody>
</table>


<form action="createproduct.php">
 <button class="btn btn-outline-primary">Add New Product </button>
 </form>
   

   </div>
  </body>
</html>
