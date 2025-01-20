<?php

include("Database/db.php");


use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;


require __DIR__ . "/vendor/autoload.php";



if (isset($_POST['send'])){

  // Check whether phone number exist

     $PhoneInput = $_POST['phone'];




     $sql = "SELECT * FROM users where Phone = '$PhoneInput'";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_num_rows($result);

     if($row>0){

      $user = mysqli_fetch_assoc($result);
      $first_name = $user['First_Name'];
              //  SMS API configuration Start
                $random = rand();
                $message = "Portfolio Ready \n  Hello $first_name  Your OTP is   $random  \n  Please Do not Share with anyone!" ;
                $phoneNumber = $PhoneInput;
                $apiURL = "v3959v.api.infobip.com";
                $apiKey = "75a2dcc601dd99006f941bfb2d043a54-0eb0234d-38c2-4ae8-a89b-a018168f95b8";
                
                
                $configuration = new Configuration(host: $apiURL, apiKey: $apiKey );
                $api = new SmsApi(config: $configuration);
                $destination = new SmsDestination(to: $phoneNumber);
                $theMessage = new SmsTextualMessage(
                    destinations: [$destination],
                    text: $message,
                    from: "Portfolio Ready"
                );
                
                
                // Send Message
                
                    $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
                    $response = $api ->sendSmsMessage($request);
                
                    echo'
                      <div class="alert alert-success container w-50" role="alert">
                          OTP Sent Successfully! Kindly Check!
                      </div>
                    
                    ';
                // SMS API cONFIGURATION end

              }else{
                echo'
                <div class="alert alert-warning container w-50" role="alert">
                  Invalid Phone Number
                </div>
              ';
           }
       }
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
      <h1>Forgot your password?</h1>
      <hr></hr>
      <h3>Enter your Phone Number</h3>
      <form action="reset.php" method="post">
        <label for="phone number">Phone Number</label></br>
        <input type="tel" id="name" name="phone" placeholder="+254*** " required onblur="validateName(name)">   
      <button type="submit" name="send">Send Otp</button>
         <span id="nameError" style="display: none;" >There was an error with your Phone</span>
      </form>  

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


