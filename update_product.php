<?php
include("db.php");
$name = '';
$description = '';
$price =  '';
$amount = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM product WHERE id_product=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name_product'];
    $description = $row['description_product'];
    $price = $row['price_product'];
    $amount = $row['amount_product'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];

  $query = "UPDATE product set name_product = '$name', description_product = '$description', price_product = '$price', amount_product = '$amount' WHERE id_product=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Producto modificado satisfactoriamente';
  $_SESSION['message_type'] = 'warning'; 
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_product.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" value="<?php echo $name; ?>"
                            placeholder="Modifica el nombre">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30"
                            rows="10"><?php echo $description;?></textarea>
                    </div>
                    <div class="form-group">
                        <input name="price" type="text" class="form-control" value="<?php echo $price; ?>"
                            placeholder="Modifica el precio">
                    </div>
                    <div class="form-group">
                        <input name="amount" type="text" class="form-control" value="<?php echo $amount; ?>"
                            placeholder="Modifica la cantidad">
                    </div>
                    <button class="btn-success" name="update">
                        Modificar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>