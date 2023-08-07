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
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $ComplaintType = $_POST['ComplaintType'];
    $Complaint = $_POST['Complaint'];

    $sql = "INSERT INTO `fileacomplaint` (`Name`, `Email`, `ComplaintType`, `Complaint`) VALUES ('$Name', '$Email', '$ComplaintType', '$Complaint');";

    if ($conn->query($sql) === TRUE) {
        echo "<script>if (confirm('Complaint Registered succesfully! We will look forward it ')) { document.location.href = 'http://localhost/ssc/fileacomplaint.php' };</script>";
    } else {
        echo "<script>alert('Failed to Report ')</script>";
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Complaint Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bilso</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
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
            <div class = "text-center">
            <h1>Complaint Form</h1>
            </div>
            <form id="complaintForm" action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="Name" required>
                </div>
                <div class=" form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="Email" id=" email" required>
                </div>
                <div class="form-group">
                    <label for="complaintType">Complaint Type:</label>
                    <select class="form-control" id="complaintType" name="ComplaintType" required>
                        <option value="">Select Complaint Type</option>
                        <option value=" service">Service</option>
                        <option value="product">Product</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="complaint">Complaint:</label>
                    <textarea class="form-control" id="complaint" name="Complaint" rows=" 5" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit" style="background-color: #540164;">Submit Complaint</button>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="footer">
        <p>&copy; Bilso 2023</p>
    </footer>
</body>

</html>