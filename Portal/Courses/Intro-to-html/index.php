<?php
// Start the session
session_start();
if (!isset($_SESSION['google_auth']) && !isset($_SESSION['github_auth']) && !isset($_SESSION['email_auth'])) {
  header('location: ../../../AUTH/signin.php');
  exit();
}

// Check if the user is logged in
// Check which session variable is set and get the user ID
$id = isset($_SESSION['google_auth']) ? $_SESSION['google_auth'] : (isset($_SESSION['github_auth']) ? $_SESSION['github_auth'] : $_SESSION['email_auth']);

include('../../../Database/db.php'); //connection to database

require '../../../vendor/autoload.php'; // Ensure Parsedown is included

use Dotenv\Dotenv; // Keep this for dotenv since it is namespaced

// Load environment variables
$dotenv = Dotenv::createImmutable('../../../');
$dotenv->load();

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE SN = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$details = $result->fetch_object();

$profileImage = htmlspecialchars($details->Avatar, ENT_QUOTES, 'UTF-8'); // Sanitize output
$name = htmlspecialchars($details->First_Name, ENT_QUOTES, 'UTF-8'); // Sanitize output
$email = htmlspecialchars($details->Email, ENT_QUOTES, 'UTF-8'); // Sanitize output





// Ask Astra start
$userprompt = "";
$htmlOutput = "";

if (isset($_POST["askastra"])) {

    require '../../../vendor/autoload.php'; // Ensure Parsedown is included

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
            ],
            "generationConfig" => [
                "temperature" => 0.85,
                "topK" => 40,
                "topP" => 0.95,
                "maxOutputTokens" => 8192,
                "responseMimeType" => "text/plain"
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
    $userprompt = $prompt;
    $htmlOutput = $parsedown->text($text);

    // Output HTML
    // echo $htmlOutput;
}

// Ask Astra end
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Introduction to HTML</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/vs2015.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
  <script>hljs.highlightAll();</script>


  <!-- JavaScript to Keep Offcanvas Open After Submit -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let offcanvasElement = document.getElementById("Askastra");

        // Check if the offcanvas should be opened after reload
        if (localStorage.getItem("keepOffcanvasOpen") === "true") {
            let offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
        }

        // Store the state when offcanvas opens
        offcanvasElement.addEventListener("shown.bs.offcanvas", function () {
            localStorage.setItem("keepOffcanvasOpen", "true");
        });

        // Remove state when offcanvas closes
        offcanvasElement.addEventListener("hidden.bs.offcanvas", function () {
            localStorage.removeItem("keepOffcanvasOpen");
        });

        // Ensure the offcanvas remains open after form submission
        document.getElementById("msgForm").addEventListener("submit", function () {
            localStorage.setItem("keepOffcanvasOpen", "true");
        });
    });
</script>


  <!-- BOOSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Stylesheet -->
   <link rel="stylesheet" href="Assets/CSS/style.css">
   <link rel="stylesheet" href="Assets/CSS/astra.css">
   <link rel="shortcut icon" href="Assets/Images/Favicons/android-chrome-512x512.png" type="image/x-icon">
</head>
<body style="max-height: 100vh;">

  <!-- Navigation Bar -->
  <nav class="navbar navbar-dark position-fixed container-fluid p-3 z-3">
    <div class="container-fluid">

      <a class="navbar-brand btn btn-outline-light  px-3 chat-astra" href="#" data-bs-toggle="offcanvas" data-bs-target="#Askastra" aria-controls="offcanvasRight">
        <i class="bi bi-stars"></i>
        Ask Astra
      </a>


        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-dark rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-dark); --bs-nav-pills-link-active-bg: var(--bs-white);">
          <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
          </li>
        </ul>


      <div class="right d-flex align-items-center justify-content-between">
        <div class="prof d-flex align-items-center justify-content-between">
        <a href="#" class="text-light text-decoration-none mx-1"> <?php echo $name   ?> </a>
        <div class="profile-pic mx-4 rounded-circle" style="background-image: url('<?php echo $profileImage; ?>');">
          <!-- Pofile picture is here -->
        </div>
        </div>
        <button class="btn btn-outline-warning px-3">Start Free Trial</button>
      </div>
    </div>
  </nav>
  <!-- Navigation Bar End -->


  <section class="hero  container-fluid row z-0">
                <!-- Learn Start-->
                <div class="col learn mt-5">
               
                    <div class="col top">
                        <button type="button" class="btn btn-outline-secondary  mt-5"><i class="bi bi-chevron-left"></i>Learn</button>
                        <p class="py-3">Introduction to Html</p>
      
                        <h2>Introduction to Html</h2>
                        <small>4 mins</small>
                    </div>

                    <div class="col mid py-3">
                           <p>Welcome to the world of code! Last year, millions of learners from our community started with HTML. Why? HTML is the skeleton of all web pages. It’s often the first language learned by developers, marketers, and designers and is core to front-end development work. If this is your first time touching code, we’re excited for what you’re about to create.</p>
                    </div>

                    <!-- instruction Start -->
                    <div class="form-check bg-body-tertiary  py-1">
                      <input class="form-check-input ms-1" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label ms-1 fw-semibold" for="flexCheckIndeterminate">
                          Instructions
                      </label>
                    </div>

                    
                   <!-- Instruction 1 -->
                    <div class="col d-flex align-items-baseline justify-content-start ms-5  mt-4">
                              <input class="form-check-input me-2" type="checkbox" id="checkboxNoLabel" value="" aria-label="Confirm this">
                              <p>
                                In the code editor to the right, type your name in between <code> &lt;h1&gt; </code>  and <code> &lt;/h1&gt; </code>  then press Run.
                              </p>
                    </div>

                    <div class="col d-flex align-items-baseline justify-content-start ms-5  mt-4">
                              <input class="form-check-input me-2" type="checkbox" id="checkboxNoLabel" value="" aria-label="Confirm this">
                              <p>
                                In the code editor to the right, type your name in between <code> &lt;p&gt; </code>  and <code> &lt;/p&gt; </code>  then press Run.
                              </p>
                    </div>

                    <div class="col d-flex align-items-baseline justify-content-start ms-5  mt-4">
                              <input class="form-check-input me-2" type="checkbox" id="checkboxNoLabel" value="" aria-label="Confirm this">
                              <p>
                                In the code editor to the right, type your name in between <code> &lt;p&gt; </code>  and <code> &lt;/p&gt; </code>  then press Run.
                              </p>
                    </div>

                    <div class="col d-flex align-items-baseline justify-content-start ms-5  mt-4">
                              <input class="form-check-input me-2" type="checkbox" id="checkboxNoLabel" value="" aria-label="Confirm this">
                              <p>
                                In the code editor to the right, type your name in between <code> &lt;p&gt; </code>  and <code> &lt;/p&gt; </code>  then press Run.
                              </p>
                    </div>

                    <button class="btn btn-warning continue-btn" style="gap: 1.5rem; position: fixed; margin: auto; width: 80%;  bottom: 10px;">Continue</button>
                </div>
                <!-- Learn End -->


                <!-- Code -->
                <div class="col code mt-5" >

                   <!-- Handles  Code -->
                  <div class="html-container">
                      <div class="file container-fluid mt-5 d-flex align-items-center justify-content-start gap-4" style="text-transform: lowercase;">
                             <p class="text-light pe-4 code-nav-item html-nav" style="border-right: 1px solid gray;">index.html</p>
                             <p class="text-light pe-4 code-nav-item css-nav" style="border-right: 1px solid gray;">Style.css</p>
                             <p class="text-light code-nav-item js-nav">Script.js</p>
                      </div>


                        <!-- Html Handler -->
                      <textarea id="html-code" class="container-fluid textarea html-code" rows="30" style="color: aliceblue; background-color: black; overflow-y: scroll; width: 100%;" placeholder="Press ! and click enter to get basic html layout"  spellcheck="false" >
                        <!-- HTML here -->
                      </textarea>

                      <!-- Css Handler -->
                      <textarea id="css-code" class="container-fluid textarea css-code" rows="30"  style="color: aliceblue; background-color: black; overflow-y: scroll; width: 100%;" placeholder="Write your CSS here.." spellcheck="false">
                        <!-- Css here -->
                      </textarea>

                      <!-- Js Handeler -->
                      <textarea id="js-code" class="container-fluid textarea js-code" rows="30"  style="color: aliceblue; background-color: black; overflow-y: scroll; width: 100%;" placeholder="Write your Js Here.." spellcheck="false">
                        <!-- Javascript here -->
                      </textarea>



                      <div class="run d-flex align-items-center justify-content-start ms-4" style="gap: 1.5rem; position: fixed; bottom: 10px;">
                        <button class="btn btn-warning" id="run-button">Run</button>     
                        <i class="bi bi-terminal text-light" style="font-size: 2rem;" data-bs-toggle="offcanvas" data-bs-target="#console" aria-controls="offcanvasBottom"></i>
                        <i class="bi bi-clipboard-check  text-light" style="font-size: 2rem;"></i>
                        <i class="bi bi-arrow-repeat text-light" style="font-size: 2rem;"></i>
                   
                      </div>
                  </div>
                  <!-- End of code Handler -->

               </div>
               

                <!-- Preview -->
                <div class="col preview mt-5">
                    <div class="bg-dark container-fluid mt-5 py-3 d-flex align-items-center justify-content-around">
                        <i class="bi bi-chevron-left text-light" style="font-size: 1rem;" ></i>
                        <i class="text-light" style="font-size: 1rem; font-style: normal;">https://localhost:8000</i>
                        <i class="bi bi-arrows-angle-expand text-light" style="font-size: 1rem;"></i>
                    </div>

                    <!-- Output Section -->
                    <div class="output">
                      <iframe id="output" width="100%"  style="resize: vertical;"></iframe>
                    </div>

    

                  <!-- back next -->
                    <div class="run d-flex ms-4" style="gap: 1.5rem; position: fixed; right: 10px; bottom: 10px;">
                      <button class="btn btn-outline-dark">Back</button>
                      <button class="btn btn-warning">Next</button>
                    </div>
              </div>
      </section>


      <!-- Offcanvas elements start -->
       <!-- console canvas -->
      <div class="offcanvas offcanvas-bottom" tabindex="-1" id="console" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasBottomLabel">Console</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small bg-dark" >
          <!-- Console output section -->
           <div id="console-output">
                <div id="console-messages" class="text-light"></div>
           </div>
          
        </div>
      </div>




    <!-- Ask Astra Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="Askastra" aria-labelledby="offcanvasRightLabel" style="width: 50%;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Chat with Astra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <div id="chat-messages" class="flex-grow-1 overflow-auto mb-3">
            <!-- Chat messages will appear here -->
            <div id="chatMessages" class="chat-messages">
                <div class="message bot mb-4">Hi, welcome Astra here! How can we assist you today? 😍</div>
                <?php if (!empty($userprompt)): ?>
                    <div class="message user"><?php echo $userprompt; ?></div>
                <?php endif; ?>
                <?php if (!empty($htmlOutput)): ?>
                    <div class="message bot"><?php echo $htmlOutput; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="input-group" id="msgForm">
            <textarea id="chatInput" name="prompt" class="form-control" rows="1" placeholder="Type your message..."></textarea>
            <button type="submit" name="askastra" id="send-button" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>






      <style>
        /* code {
          font-family: 'Consolas', 'Courier New', monospace;
          color:rgb(230, 84, 17);
          padding: 2px 4px;
          border-radius: 3px;
        }

        pre {
          background-color: #1e1e1e;
          color: #d4d4d4;
          padding: 15px;
          border-radius: 5px;
          overflow: auto;
          margin: 20px 0;
          font-size: 14px;
          line-height: 1.4;
        } */
      </style>




      <!-- Ast -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="Assets/JS/script.js"></script>
      <!-- Markedown -->
      <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

      <script>
        // onload
        window.onload = function() {
          if (window.innerWidth < 1024) {
            window.location.href = "debug-001.html"; // Replace with your desired URL
          }
        };

      // onresize
      window.onresize = function() {
        if (window.innerWidth < 1024) {
          window.location.href = "debug-001.html"; // Replace with your desired URL
        }
      };

  </script>
</body>
</html>
