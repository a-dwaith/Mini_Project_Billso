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

    $sql = "UPDATE stocks SET AvailableQuantity = AvailableQuantity - 2 WHERE ProductName IN ('Biscut', 'Milk')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>if (confirm('Payment donne succesfully! ')) { document.location.href = 'http://localhost/ssc/payment_done.html' };</script>";
    } else {
        echo "<script>alert('Failed to pay ')</script>";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <title>Payment Gateway - UPI</title>
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

        .form-frame {
            max-width: 400px;
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
        <div class="col-md-6 form-frame">
            <h1 class="text-center mb-4">UPI Payment Gateway</h1>
            <form action ="" method="post">
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" id="amount" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="upi" class="form-label">UPI ID / Mobile Number</label>
                    <input type="text" id="upiId" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" id="description" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" id="done" class="btn btn-primary " name="submit" style="background-color: #540164;">Pay</button>
                    <!-- <a href="http://localhost/ssc/payment_done.html" class="btn btn-primary" style="background-color: #540164;">Pay</a> -->
                    <button type="button" onclick="generateQRCode()" class="btn btn-secondary" style="background-color: #540164;">Generate QR Code</button>

                </div>
            </form>
            <div id="qrcode" class="mt-3 d-flex justify-content-center"></div>

            <script>
                function generateQRCode() {
                    const upiId = document.getElementById("upiId").value;
                    const amount = document.getElementById("amount").value;
                    const description = document.getElementById("description").value;
                    const paymentUrl = `upi://${upiId}?amount=${amount}&tn=${encodeURIComponent(description)}`;

                    const qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: paymentUrl,
                        width: 200,
                        height: 200,
                    });

                    // Center the QR code
                    const qrcodeWidth = document.getElementById("qrcode").offsetWidth;
                    const qrcodeHeight = document.getElementById("qrcode").offsetHeight;
                    const formWidth = document.getElementById("form-frame").offsetWidth;
                    const formHeight = document.getElementById("form-frame").offsetHeight;
                    const qrcodeTop = (formHeight - qrcodeHeight) / 2;
                    const qrcodeLeft = (formWidth - qrcodeWidth) / 2;
                    document.getElementById("qrcode").style.top = qrcodeTop + "px";
                    document.getElementById("qrcode").style.left = qrcodeLeft + "px";
                }
            </script>
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