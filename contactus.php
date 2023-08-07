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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql = "INSERT INTO `contactus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');";

    if ($conn->query($sql) === TRUE) {
        echo "<script>if (confirm('Thanks for your response, Enjoy shopping')) { document.location.href = 'http://localhost/ssc/index.php' };</script>";
    } else {
        echo "<script>alert('Failed to Respond ')</script>";
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        
        .navbar-custom {
            background-color: #540164;
            
        }

        /* Customize the text color of the navbar links and brand */
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

    <section class="py-5">
        <div class="container">
            <div class="col-md-6 mt-5">
                <h2 class="text-center mb-4">Contact Us</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #540164;" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; Bilso 2023</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>