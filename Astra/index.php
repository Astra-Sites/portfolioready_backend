<?php

require '../vendor/autoload.php'; // Ensure Parsedown is included

use Dotenv\Dotenv; // Keep this for dotenv since it is namespaced

// Load environment variables
$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

if (isset($_POST["submit"])) {
    // Initialize Parsedown directly
    $parsedown = new Parsedown();

    $prompt = trim($_POST["prompt"]);
    $prompt = htmlspecialchars($prompt, ENT_QUOTES, 'UTF-8');

    // cURL initialization and request
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $_ENV['GOOGLE_GEMINI_URL'] . '?key=' . $_ENV['GOOGLE_GEMINI_API'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ]),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        echo "cURL Error: " . curl_error($curl);
        curl_close($curl);
        exit;
    }

    curl_close($curl);

    $data = json_decode($response, true);
    $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? "No text found";

    // Convert Markdown to HTML
    $htmlOutput = $parsedown->text($text);

    // Output HTML
    // echo $htmlOutput;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astra Ai Assistant</title>
  <link rel="stylesheet" href="Assets/Css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="chat-container">
    <div class="chat-header d-flex align-items-center justify-content-space-around"><i class="bi bi-h-circle me-4"></i>Astra Ai Assistant</div>
    <div id="chatMessages" class="chat-messages">
      <div class="message bot">Hi, welcome Astra here!  How can we assit you today?. 😍</div>
      <div class="message bot"><?php echo$htmlOutput; ?></div>
    </div>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="msgForm">
    <div id="loading" class="loading-spinner"></div>
    <div class="chat-footer">
      <input id="chatInput" name="prompt" value="Hello" type="text" placeholder="Enter your message..." />
      <button type="submit" name="submit" id="sendButton">Send</button>
    </div>
    </form>
  </div>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

  <script src="Assets/Js/script.js"></script>
</body>
</html>


