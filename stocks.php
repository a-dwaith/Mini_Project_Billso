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

$query = "SELECT * FROM stocks ORDER BY AvailableQuantity ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Stocks</title>
    <style>
        .top {
            margin-top: 10rem;
        }
    </style>
    <style>
    
        .navbar-custom {
            background-color: #540164;
            
        }

        
        .navbar-custom .navbar-nav .nav-link,
        .navbar-custom .navbar-brand {
            color: white;
        }

        
        .navbar-custom .navbar-nav .nav-link:hover {
            color: yellow;
        }

       
        .footer {
            background-color: #ffffff;
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
            <a class="navbar-brand" href="#">Billso</a>
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
    <div class="container mt-5">
        <br><br><br>
        <h1 class="text-center mb-5">Stock Details</h1>
        <form action="" method="post">
            <div class="input-group mb-5">
                <input type="text" class="form-control" name="search" placeholder="Search for an item" aria-label="Search for an item" aria-describedby="search-button">
                <button class="btn btn-primary" type="button" id="search-button" style="background-color: #540164;" name="submit">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Available Quantity</th>
                    <th scope="col">Total Value</th>
                </tr>
            </thead>
            <?php
            if (mysqli_num_rows($result) > 0) {
                // $r_no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <!-- <td><?php echo $r_no; ?> </td> -->
                        <td><?php echo $data['ProductID']; ?> </td>
                        <td><?php echo $data['ProductName']; ?> </td>
                        <td><?php echo $data['UnitPrice']; ?> </td>
                        <td><?php echo $data['AvailableQuantity']; ?> </td>
                        <td><?php echo $data['TotalValue']; ?> </td>
                    <tr>
                    <?php

                }
            } else { ?>
                    <tr>
                        <td colspan="8">No data found</td>
                    </tr>

                <?php } ?>
        </table>
        <div class="text-center">
            <a href="http://localhost/ssc/updatestocks.php" class="btn btn-primary" style="background-color: #540164;">Update stocks</a>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Billso 2023</p>
    </footer>
</body>

</html>