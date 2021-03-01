<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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

    <form>
    <div class="form-group">
       <label>Title</label>
       <input type="text" class="form-control">
    </div>

    <div class="form-group">
       <label>Product Price</label>
       <input type="number" step=".01" class="form-control">
    </div>
    
    
    <div class="form-group">
       <label>Description</label>
       <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
       <label>Image</label>
       <input type="file">
    </div>

    <button type="submit" class="btn btn-primary">Submit </button>
    
    

</form>

   

</table>
   
  </body>
</html>