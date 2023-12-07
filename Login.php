<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Product Information</h2>
        <?php if (isset($_SESSION['error_method'])) : ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error_method'];
                unset($_SESSION['error_method']);
                ?>
            </div>
        <?php endif; ?>
        <form action="Data.php" method="POST" enctype="multipart/form-data">
            <!-- Name Input -->
            <div class="form-group">
                <label for="productName">Name:</label>
                <input type="text" name="name" class="form-control" id="productName" placeholder="Enter product name">
                <?php if (isset($_SESSION['errors']['error_name'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['errors']['error_name'];
                        unset($_SESSION['errors']['error_name']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Description Input -->
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <textarea class="form-control" name="description" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                <?php if (isset($_SESSION['errors']['error_descriotion'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['errors']['error_descriotion'];
                        unset($_SESSION['errors']['error_descriotion']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Price Input -->
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" name="price" class="form-control" id="productPrice" placeholder="Enter product price">
                <?php if (isset($_SESSION['errors']['error_price'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['errors']['error_price'];
                        unset($_SESSION['errors']['error_price']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Discount Input -->
            <div class="form-group">
                <label for="productDiscount">Discount:</label>
                <input type="number" name="discount" class="form-control" id="productDiscount" placeholder="Enter product discount (if any)">
                <?php if (isset($_SESSION['errors']['error_discount'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['errors']['error_discount'];
                        unset($_SESSION['errors']['error_discount']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Image Input -->
            <div class="form-group">
                <label for="productImage">Image:</label>
                <input type="file" name="image" class="form-control" id="productImage" placeholder="Enter product image URL">
                <?php if (isset($_SESSION['errors']['error_image'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['errors']['error_image'];
                        unset($_SESSION['errors']['error_image']);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>