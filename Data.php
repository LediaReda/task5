<?php
session_start();
// request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $$key = trim(htmlspecialchars(htmlentities($value)));
    }
    $errors = [];
    // validate name
    if (empty($name)) {
        $errors['error_name'] = 'Name is required';
    } elseif (strlen($name) < 5) {
        $errors['error_name'] = 'Name Must be at least 5 characters';
    } elseif (is_numeric($name)) {
        $errors['error_name'] = 'Name Must be a string';
    }

    if (empty($description)) {
        $errors['error_descriotion'] = 'Description is required';
    } elseif (strlen($description) < 11) {
        $errors['error_descriotion'] = 'Description Must be at least 11 characters';
    } elseif (is_numeric($description)) {
        $errors['error_descriotion'] = 'Description Must be a string';
    }

    if (empty($price)) {
        $errors['error_price'] = 'Price is required';
    } elseif ($price <= 0) {
        $errors['error_price'] = 'Price Must be at least 1';
    }

    if (empty($discount)) {
        $errors['error_discount'] = 'Discount is required';
    } elseif ($discount < 0) {
        $errors['error_discount'] = 'Discount Must be at least 0';
    } elseif ($discount > 100) {
        $errors['error_discount'] = 'Discount Must be less than 100';
    }

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];
    $image_size = $image['size'];
    $image_type = $image['type'];

    $allowed_extentions = ['jpg', 'jpeg','png'];
    $allowed_mime_types = ['image/jpeg','image/png'];

    if (empty($image_name)) {
        $errors['error_image'] = 'Image Is Required';
    // } else {
    //     $arrayName = explode('.', $image_name);
    //     $extentionInRequest = end($arrayName);
    //     if (!in_array($extentionInRequest, $allowed_extentions)) {
    //         $errors['error_image'] = 'Not Allowed Extension';
    //     } else {
    //         $mimeType = mime_content_type($image_tmp_name);
    //         if (!in_array($mimeType, $allowed_mime_types)) {
    //             $errors['error_image'] = 'Not Allowed Mime Type';
    //         } else {
    //             if ($image_size < 100) {
    //                 $errors['error_image'] = 'Not Allowed Size';
    //             } else {
    //                 $finalName = rand(10000, 200000) . time() . '.' . $extentionInRequest;
    //                 move_uploaded_file($image_tmp_name, 'img/' . $finalName);
    //             }
    //         }
    //     }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location:Login.php');
        die;
    }
} else {
    $_SESSION['error_method'] = 'Not Allowed Method';
    header('Location:Login.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
                <th>Discount</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $description ?></td>
                <td><?php echo $price ?></td>
                <td><?php echo $discount ?></td>
                <td>
                    <img src="<?php echo 'img/' . $finalName ?>" alt="">
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>move_uploaded_file