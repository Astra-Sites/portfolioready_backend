<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Editor with Console</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"/>
</head>
<body>
    <header>
        <h1>Real-Time HTML/CSS/JS Editor with Console</h1>
    </header>

    <div class="container d-flex align-items-center flex-column">            
    
        <div class="top d-flex container align-items-center justify-content-center gap-3">
              <!-- Run button -->
              <button id="run-button">Run</button>
              <button class="btn btn-warning full">Full Screen</button>
        </div>
    
        <div class="body-sec container d-flex align-items-center flex-row">
                <div class="left">
                    <label for="html-code"><i class="fab fa-html5"></i> HTML</label>
                    <textarea id="html-code" placeholder="Write HTML code here..."></textarea>

                    <label for="css-code"><i class="fab fa-css3-alt"></i> CSS</label>
                    <textarea id="css-code" placeholder="Write CSS code here..."></textarea>

                    <label for="js-code"><i class="fab fa-js"></i> JavaScript</label>
                    <textarea id="js-code" placeholder="Write JavaScript code here..."></textarea>
                </div>

                <div class="right">
                    <label for="output"><i class="fas fa-play"></i> Output</label>
                    <iframe id="output"></iframe>

                    <!-- Console output section -->
                    <div id="console-output">
                        <label><i class="fas fa-terminal"></i> Console</label>
                        <div id="console-messages"></div>
                    </div>
                </div>
                    
            </div>
         </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


</body>
</html>
