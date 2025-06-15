<?php

session_start();

include('../common/db_connect.php');

if (isset($_SESSION['user']['role']) == 'admin') {


    if (isset($_POST['add_product'])) {
        if (empty($_POST['name'])) {
            $_SESSION['name_error'] = "*Please Write a name for your product!";
        } else {
            unset($_SESSION['name_error']);
            $_SESSION['name'] = htmlspecialchars($_POST['name']);
        }

        if (empty($_POST['price'])) {
            $_SESSION['price_error'] = "*Price is Required!";
        } elseif (!is_numeric($_POST['price'])) {
            $_SESSION['price_error'] = "*Price should be integer!";
        } else {
            unset($_SESSION['number_error']);
            $_SESSION['price'] = htmlspecialchars($_POST['price']);
        }

        $sql = "SELECT * FROM category;";
        $result = $conn->query($sql);
        $validate_category = TRUE;

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category_id = $row['id'];
                    if ($_POST['category_id'] == $category_id) {
                        $validate_category = FALSE;
                        break;
                    }
                }
            }
        }

        if (empty($_POST['category_id'])) {
            $_SESSION['category_id_error'] = "*Please select a category!";
        } elseif ($validate_category) {
            $_SESSION['category_id_error'] = "*Please select a valid category!";
        } else {
            unset($_SESSION['category_id_error']);
            $_SESSION['category_id'] = htmlspecialchars($_POST['category_id']);
        }

        if (empty($_POST['description'])) {
            $_SESSION['description_error'] = "*Please Write description for your product!";
        } else {
            unset($_SESSION['description_error']);
            $_SESSION['description'] = htmlspecialchars($_POST['description']);
        }

        if ($_FILES['image']['size'] > 0) {
            // File is NOT empty
            unset($_SESSION['image_error']);
        } else {
            $_SESSION['image_error'] = "❌ Image is empty.";
        }


        if (!isset($_SESSION['name_error']) && !isset($_SESSION['price_error']) && !isset($_SESSION['description_error']) && !isset($_SESSION['category_id_error']) && !isset($_SESSION['image_error'])) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $file = $_FILES['image'];

                // Get file name and extension
                $fileName = $file['name'];
                $fileTmp  = $file['tmp_name'];
                $fileSize = $file['size'];

                // Get extension in lowercase
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Allowed types
                $allowedExt = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExt, $allowedExt)) {
                    // Optional: check MIME type (for extra safety)
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime  = finfo_file($finfo, $fileTmp);
                    finfo_close($finfo);

                    $allowedMime = ['image/jpeg', 'image/png'];

                    if (in_array($mime, $allowedMime)) {
                        // Move file to uploads/ folder
                        $destination = 'product_images/' . $fileName;

                        $sql = "SELECT * FROM products WHERE image_name = '$fileName';";
                        $result = $conn->query($sql);

                        if ($result->num_rows == 0) {
                            if (move_uploaded_file($fileTmp, $destination)) {
                                $image_name = $fileName;
                                $image_path = $destination;
                                $name = $_SESSION['name'];
                                $price = $_SESSION['price'];
                                $description = $_SESSION['description'];
                                $category_id = $_SESSION['category_id'];

                                $product = $conn->prepare("INSERT INTO products (name, image_name, description, image_path, price, category_id) VALUES (?,?,?,?,?,?)");
                                $product->bind_param("ssssii", $name, $image_name, $description, $image_path, $price, $category_id);
                                $product_result = $product->execute();
                                unset($_SESSION['name']);
                                unset($_SESSION['price']);
                                unset($_SESSION['description']);
                                unset($_SESSION['category_id']);
                                header("Location: /glamistry/admin/?products=true");
                                die();
                            } else {
                                $_SESSION['image_error'] = "❌ Failed to move uploaded file.";
                                header("Location: /glamistry/admin/?add_product=true");
                                die();
                            }
                        } else {
                            $_SESSION['image_error'] = "❌ $fileName : image by this name already exist!";
                            header("Location: /glamistry/admin/?add_product=true");
                            die();
                        }
                    } else {
                        $_SESSION['image_error'] = "❌ Invalid MIME type: $mime";
                        header("Location: /glamistry/admin/?add_product=true");
                        die();
                    }
                } else {
                    $_SESSION['image_error'] = "❌ Only JPG and PNG files are allowed.";
                    header("Location: /glamistry/admin/?add_product=true");
                    die();
                }
            } else {
                $_SESSION['image_error'] = "❌ No file uploaded or error in uploading.";
                header("Location: /glamistry/admin/?add_product=true");
                die();
            }
        } else {
            header("Location: /glamistry/admin/?add_product=true");
            die();
        }
    }

    // Edit Product

    if (isset($_POST['edit_product']) && isset($_POST['product_id'])) {
        if (empty($_POST['name'])) {
            $_SESSION['name_error'] = "*Please Write a name for your product!";
        } else {
            unset($_SESSION['name_error']);
            $_SESSION['name'] = htmlspecialchars($_POST['name']);
        }

        if (empty($_POST['price'])) {
            $_SESSION['price_error'] = "*Price is Required!";
        } elseif (!is_numeric($_POST['price'])) {
            $_SESSION['price_error'] = "*Price should be integer!";
        } else {
            unset($_SESSION['number_error']);
            $_SESSION['price'] = htmlspecialchars($_POST['price']);
        }

        $sql = "SELECT * FROM category;";
        $result = $conn->query($sql);
        $validate_category = TRUE;

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category_id = $row['id'];
                    if ($_POST['category_id'] == $category_id) {
                        $validate_category = FALSE;
                        break;
                    }
                }
            }
        }

        if (empty($_POST['category_id'])) {
            $_SESSION['category_id_error'] = "*Please select a category!";
        } elseif ($validate_category) {
            $_SESSION['category_id_error'] = "*Please select a valid category!";
        } else {
            unset($_SESSION['category_id_error']);
            $_SESSION['category_id'] = htmlspecialchars($_POST['category_id']);
        }

        if (empty($_POST['description'])) {
            $_SESSION['description_error'] = "*Please Write description for your product!";
        } else {
            unset($_SESSION['description_error']);
            $_SESSION['description'] = htmlspecialchars($_POST['description']);
        }

        if ($_FILES['image']['size'] > 0) {
            // File is NOT empty
            unset($_SESSION['image_error']);
        } else {
            $_SESSION['image_error'] = "❌ Image is empty.";
        }


        if (!isset($_SESSION['name_error']) && !isset($_SESSION['price_error']) && !isset($_SESSION['description_error']) && !isset($_SESSION['category_id_error']) && !isset($_SESSION['image_error'])) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $file = $_FILES['image'];

                // Get file name and extension
                $fileName = $file['name'];
                $fileTmp  = $file['tmp_name'];
                $fileSize = $file['size'];

                // Get extension in lowercase
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Allowed types
                $allowedExt = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExt, $allowedExt)) {
                    // Optional: check MIME type (for extra safety)
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime  = finfo_file($finfo, $fileTmp);
                    finfo_close($finfo);

                    $allowedMime = ['image/jpeg', 'image/png'];

                    if (in_array($mime, $allowedMime)) {
                        // Move file to uploads/ folder
                        $destination = 'product_images/' . $fileName;

                        $sql = "SELECT * FROM products WHERE image_name = '$fileName';";
                        $result = $conn->query($sql);

                        if ($result->num_rows == 0) {
                            if (move_uploaded_file($fileTmp, $destination)) {
                                $image_name = $fileName;
                                $image_path = $destination;
                                $name = $_SESSION['name'];
                                $price = $_SESSION['price'];
                                $description = $_SESSION['description'];
                                $category_id = $_SESSION['category_id'];
                                $product_id = $_POST['product_id'];

                                $product = $conn->prepare("UPDATE products SET name = ?, image_name = ?, description = ?, image_path = ?, price = ?, category_id = ? WHERE id = ?;");
                                $product->bind_param("ssssiii", $name, $image_name, $description, $image_path, $price, $category_id, $product_id);
                                $product_result = $product->execute();
                                unset($_SESSION['name']);
                                unset($_SESSION['price']);
                                unset($_SESSION['description']);
                                unset($_SESSION['category_id']);
                                header("Location: /glamistry/admin/?products=true");
                                die();
                            } else {
                                $_SESSION['image_error'] = "❌ Failed to move uploaded file.";
                                header("Location: /glamistry/admin/?add_product=true");
                                die();
                            }
                        } else {
                            $_SESSION['image_error'] = "❌ $fileName : image by this name already exist!";
                            header("Location: /glamistry/admin/?add_product=true");
                            die();
                        }
                    } else {
                        $_SESSION['image_error'] = "❌ Invalid MIME type: $mime";
                        header("Location: /glamistry/admin/?add_product=true");
                        die();
                    }
                } else {
                    $_SESSION['image_error'] = "❌ Only JPG and PNG files are allowed.";
                    header("Location: /glamistry/admin/?add_product=true");
                    die();
                }
            } else {
                $_SESSION['image_error'] = "❌ No file uploaded or error in uploading.";
                header("Location: /glamistry/admin/?add_product=true");
                die();
            }
        } else {
            header("Location: /glamistry/admin/?add_product=true");
            die();
        }
    } else {
        header("Location: /glamistry/admin/");
        die();
    }
} else {
    header("Location: /glamistry/");
    die();
}
