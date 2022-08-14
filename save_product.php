<?php

include('db.php');

if (isset($_POST['save_product'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];
  
  $query = "INSERT INTO product(name_product, description_product, price_product, amount_product) VALUES ('$name', '$description', '$price', '$amount')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'product Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>