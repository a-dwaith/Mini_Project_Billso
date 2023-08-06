<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mini_pro';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $unitPrice = $_POST['unitPrice'];
    $availableQuantity = $_POST['availableQuantity'];

    $sql = "INSERT INTO `stocks` (`ProductID`, `ProductName`, `UnitPrice`, `AvailableQuantity`) VALUES ('$productId', '$productName', '$unitPrice', '$availableQuantity');";

    if ($conn->query($sql) === TRUE) {
        echo "<script>if (confirm('Registered succesfully! ')) { document.location.href = 'http://localhost/ssc/stocks.php' };</script>";
    } else {
        echo "<script>alert('Failed to update ')</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update stocks </title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        /* Customize the navbar color */
        .navbar-custom {
            background-color: #540164;
            /* Blue color */
        }

        /* Customize the text color of the navbar links and brand */
        .navbar-custom .navbar-nav .nav-link,
        .navbar-custom .navbar-brand {
            color: white;
        }

        /* Add hover effect for navbar links */
        .navbar-custom .navbar-nav .nav-link:hover {
            color: yellow;
        }

        /* Customize the footer */
        .footer {
            background-color: #ffffff;
            /*White*/
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bilso</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ssc/aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ssc/contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ssc/fileacomplaint.php">File a Complain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ssc/index.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-6 mt-5">
            <form action="" method="post">
                <fieldset class="border p-4">
                    <legend class="text-center">Update Stocks</legend>
                    <div class="mb-3">
                        <label for="productId">Product ID</label>
                        <input type="number" class="form-control" id="productId" name="productId" placeholder="Enter Product ID" required>
                    </div>
                    <div class="mb-3">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="unitPrice">Unit Price</label>
                        <input type="text" class="form-control" id="unitPrice" name="unitPrice" placeholder="Enter Unit Price" required>
                    </div>
                    <div class="mb-3">
                        <label for="availableQuantity">Available Quantity</label>
                        <input type="text" class="form-control" id="availableQuantity" name="availableQuantity" placeholder="Enter Available Quantity" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit" style="background-color: #540164;">Add Product</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Bilso 2023</p>
    </footer>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>