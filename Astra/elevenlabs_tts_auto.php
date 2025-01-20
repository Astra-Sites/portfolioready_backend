<?php

// Initialize the response variable
$responseMessage = '';
$audioFilePath = '';

if (isset($_POST["submit"])) {
    // Get the input text from the form
    $text = trim($_POST["text"]);

    // Validate the input
    if (empty($text)) {
        $responseMessage = "Please enter some text.";
    } else {
        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.elevenlabs.io/v1/text-to-speech/UgBBYS2sOqTuMpoF3BR0', // API endpoint URL
            CURLOPT_RETURNTRANSFER => true, // Return response instead of outputting it
            CURLOPT_HTTPHEADER => [
                'xi-api-key: sk_e928c3d17fe18b7e7fa6a4b02948a5963a0fbbc2784e5fc8', // API key header
                'Content-Type: application/json' // Content-Type header
            ],
            CURLOPT_POST => true, // Send POST request
            CURLOPT_POSTFIELDS => json_encode([
                'text' => $text // Text data to send
            ]) // Data to be sent
        ]);

        // Execute cURL request and store response
        $response = curl_exec($curl);

        // Handle cURL errors
        if (curl_errno($curl)) {
            $responseMessage = 'Error: ' . curl_error($curl);
        } else {
            // If the response contains audio data, we need to handle it appropriately
            // Here, we'll assume the response is the audio data and save it to a file
            if ($response) {
                // Save the response as an audio file
                $audioFilePath = 'audio_output.mp3';
                file_put_contents($audioFilePath, $response);

                // Set success message with audio file path
                $responseMessage = "Audio successfully generated and will play automatically.";
            } else {
                $responseMessage = "No response from the API.";
            }
        }

        // Close cURL session
        curl_close($curl);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text-to-Speech</title>
</head>
<body>
    <h1>Convert Text to Speech</h1>
    
    <!-- Display form and the response message -->
    <form method="POST" action="">
        <label for="text">Enter Text:</label><br>
        <textarea id="text" name="text" rows="6" cols="60" placeholder="Enter your text here..."></textarea><br>
        <button type="submit" name="submit">Convert to Speech</button>
    </form>
    
    <?php if ($responseMessage): ?>
        <div>
            <h3>Response:</h3>
            <p><?php echo $responseMessage; ?></p>
        </div>
    <?php endif; ?>

    <!-- Autoplay the audio if the file exists -->
    <?php if ($audioFilePath && file_exists($audioFilePath)): ?>
        <audio autoplay>
            <source src="<?php echo $audioFilePath; ?>" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
    <?php endif; ?>
</body>
</html>
