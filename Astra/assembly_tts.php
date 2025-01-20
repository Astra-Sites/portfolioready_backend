
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// replace with your API key
$YOUR_API_KEY = "7a67b6ea80f74b83ac5a3007819f1146";

// URL of the file to transcribe
$FILE_URL = "https://assembly.ai/wildfires.mp3";

// You can also transcribe a local file by passing in a file path
// $FILE_URL = './path/to/file.mp3';

// AssemblyAI transcript endpoint (where we submit the file)
$transcript_endpoint = "https://api.assemblyai.com/v2/transcript";

// Request parameters 
$data = array(
    "audio_url" => $FILE_URL // You can also use a URL to an audio or video file on the web
);

// HTTP request headers
$headers = array(
    "authorization: 7a67b6ea80f74b83ac5a3007819f1146",
    "content-type: application/json"
);

// submit for transcription via HTTP request
$curl = curl_init($transcript_endpoint);

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

$response = json_decode($response, true);

curl_close($curl);

# polling for transcription completion
$transcript_id = $response['id'];
$polling_endpoint = "https://api.assemblyai.com/v2/transcript/" . $transcript_id;

while (true) {
    $polling_response = curl_init($polling_endpoint);

    curl_setopt($polling_response, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($polling_response, CURLOPT_RETURNTRANSFER, true);

    $transcription_result = json_decode(curl_exec($polling_response), true);

    if ($transcription_result['status'] === "completed") {
        echo $transcription_result['text'];
        break;
    } else if ($transcription_result['status'] === "error") {
        throw new Exception("Transcription failed: " . $transcription_result['error']);
    } else {
        sleep(3);
    }
}

?>