<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        p {
            font-size: x-larges;
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ssc/index.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <main>
        <div class="container">
            <section>
                <div class="text-center">
                    <h1>About Us</h1>
                    <br><br>
                </div>
                <p style="font-size: x-large;">Welcome to Billso, your smart shopping cart companion. We strive to provide you with the best shopping experience
                    by making your shopping trips more convenient and efficient. With Billso, you can enjoy a seamless checkout process
                    and smart features to organize your shopping list.</p>
                <p style="font-size: x-large;">Our team is dedicated to delivering innovative solutions that enhance your shopping journey. We are passionate
                    about technology and how it can simplify everyday tasks. Whether you're shopping in-store or online, Billso is here
                    to make your shopping experience more enjoyable.</p>
                <p style="font-size: x-large;">Join us on this exciting journey as we revolutionize the way you shop!</p>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Bilso 2023</p>
    </footer>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>