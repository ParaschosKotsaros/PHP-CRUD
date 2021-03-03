<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$errors = [];


if($_SERVER['REQUEST_METHOD'] === 'POST'){
$title =$_POST['title'];
$description =$_POST['description'];
$price =$_POST['price'];
$date = date("Y-m-d  h:i:s");

if(!$title){
   $errors[] = "Title is required";
}

if(!$price){
   $errors[]= "Price is required";
}


if(empty($errors)){
$statement = $pdo->prepare("INSERT INTO products(title,price,img,create_date,description)
    VALUES(:title, :price, :img, :date, :description)");

$statement->bindValue(':title',$title);
$statement->bindValue(':price',$price);
$statement->bindValue(':img','');
$statement->bindValue(':date',$date);
$statement->bindValue(':description',$description);
$statement->execute();
 
}
}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Create Product</title>
  </head>
  <body>
    <h1>Create a Product</h1>

    <form action="" method="post">

    <div class='mb-3'>
    <div class="form-group">
       <label>Title</label>
       <input type="text" class="form-control" name="title">
    </div>
    </div>

    <div class='mb-3'>
    <div class="form-group">
       <label>Product Price</label>
       <input type="number" step=".01" class="form-control" name="price">
    </div>
    </div>
    
    <div class='mb-3'>
    <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" name="description"></textarea>
    </div>
    </div>

   
    <div class='mb-3'>
    <div class="form-group">
       <label>Image</label>
       </br>
       <input type="file" name="img">
    </div>
    </div>
     
    <div class='mb-3'>
    <button type="submit" class="btn btn-primary">Submit </button>
    </div>
    
    <?php if(!empty($errors)){ ?>
    <div class="alert alert-danger">
     <?php foreach($errors as $error){ ?>
        <div> <?php echo $error ?> </div>
      <?php } ?>
    </div>
    <?php } ?>
   
</form>
</table>
   
  </body>
</html>
