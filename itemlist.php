<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Shopping Cart</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        /* .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        } */

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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Bilso</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">File a Complain</a>
                    </li>
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Log Out</a>
                        </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5"> <!-- Add 'mt-5' class for 10px margin from the navbar -->
        <h1 class="text-center mb-6">Smart Shopping Cart</h1>
        <div class="d-flex justify-content-center"> <!-- Center the table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product 1</td>
                        <td>2</td>
                        <td>$10</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <td>Product 2</td>
                        <td>1</td>
                        <td>$15</td>
                        <td>$15</td>
                    </tr>
                    <!-- Add more rows for other selected items -->
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Grand Total:</th>
                        <th>
                            <!-- JavaScript or server-side script can be used to calculate and display the grand total here -->
                            $35
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-center">
            <a href="http://localhost/ssc/payment_gateway.php" class="btn btn-primary">Pay</a>
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