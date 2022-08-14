<?php include("db.php");?>
<?php include("includes/header.php");?>
<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MESSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>

            <!-- ADD TASK FORM -->
            <div class="card card-body">
                <form action="save_product.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre de producto"
                            autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Descripcion del producto"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Precio de producto"
                            autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="amount" class="form-control" placeholder="Stock de producto"
                            autofocus>
                    </div>
                    <input type="submit" name="save_product" class="btn btn-success btn-block" value="Guardar Producto">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Creado en</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
          $query = "SELECT * FROM product";
          $result_product = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_product)) { ?>
                    <tr>
                        <td><?php echo $row['name_product']; ?></td>
                        <td><?php echo $row['description_product']; ?></td>
                        <td><?php echo $row['price_product']; ?></td>
                        <td><?php echo $row['amount_product']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="update_product.php?id=<?php echo $row['id_product']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="delete_product.php?id=<?php echo $row['id_product']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include("includes/footer.php");?>