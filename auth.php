<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client ->setClientId("29368035819-nncd0ib819rha1p386jjggsc0snmq644.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/PortfolioReady/portal/home.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfoio Ready | Authethication-Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<style>
    body {
    background-color: #f9f9f9;
 }

.logo{
  background-image:url("assets/img/logobg1.png");
  width: 150px;
  height: 150px;
  background-position:center;
  background-size:contain;
  background-repeat:no-repeat;
}

.card {
    border: none;
    border-radius: 10px;
}

.btn-outline-secondary {
    color: #555;
    border-color: #ddd;
}

.btn-outline-secondary:hover {
    background-color:rgb(184, 184, 184);
    border-color: #ccc;
}

.form-control {
    border-radius: 8px;
}

</style>
    <div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <!-- Logo -->
             <div class="logo  d-flex justify-content-center align-items-center container p-0"></div>
            <h2 class="text-center font-weight-bold mb-4">Sign In</h2>
            
            <!-- Email Address Input -->
            <form id="signup-form">
                <div class="form-group">
                    <label for="email">Email address<span class="text-danger">*</span></label>
                    <input type="email" class="form-control py-2" id="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Continue</button>
            </form>

            <!-- Already have an account -->
            <div class="text-center my-3">
                <small>Already have an account? <a href="#" class="text-success">Login</a></small>
            </div>

            <!-- OR separator -->
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 border-top"></div>
                <span class="mx-2 text-muted">OR</span>
                <div class="flex-grow-1 border-top"></div>
            </div>

            <!-- Social Login Buttons -->
            <div class="mt-3">
                <a href='<?= $url ?>' class="btn btn-outline-secondary btn-block mb-2 d-flex align-items-center justify-content-center">
                    <img src="https://auth.openai.com/assets/google-logo-NePEveMl.svg" width="20" class="mr-2">
                    Continue with Google Account
                </a>
                <button class="btn btn-outline-secondary btn-block mb-2 d-flex align-items-center justify-content-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" width="20" class="mr-2">
                    Continue with Microsoft Account
                </button>
                <button class="btn btn-outline-secondary btn-block d-flex align-items-center justify-content-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" width="20" class="mr-2">
                    Continue with Apple Account
                </button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>

        document.getElementById("signup-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const email = document.getElementById("email").value;
            if (email) {
                alert("Email submitted: " + email);
            } else {
                alert("Please enter a valid email address.");
            }
        });

    </script>


</body>
</html>
