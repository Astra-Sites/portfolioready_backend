// Select DOM elements with error handling
const runButton = document.getElementById('run-button');
const htmlEditor = document.getElementById('html-code');
const cssEditor = document.getElementById('css-code');
const jsEditor = document.getElementById('js-code');
const outputFrame = document.getElementById('output');
const consoleMessages = document.getElementById('console-messages');

// Ensure all required DOM elements are available
if (!runButton || !htmlEditor || !cssEditor || !jsEditor || !outputFrame || !consoleMessages) {
    console.error("One or more required DOM elements are missing.");
    alert("Error: Required elements are missing from the page.");
}

// Array to store console messages
const storedConsoleMessages = [];

// Function to display and store messages in the console
function handleConsole(message, type = 'log') {
    const messageElement = document.createElement('div');
    messageElement.textContent = `[${type.toUpperCase()}] ${message}`;
    consoleMessages.appendChild(messageElement);
    consoleMessages.scrollTop = consoleMessages.scrollHeight; // Scroll to latest message

    // Store the message
    storedConsoleMessages.push({ message, type });
}

// Bind handleConsole to window to access it within the iframe
window.handleConsole = handleConsole;

// Function to run the user's code with error handling
function runCode() {
    try {
        // Clear console before each run
        consoleMessages.innerHTML = '';
        storedConsoleMessages.length = 0; // Clear stored messages

        // Combine HTML, CSS, and JS into a single output
        const htmlContent = htmlEditor.value;
        const cssContent = `<style>${cssEditor.value}</style>`;
        const jsContent = `
            <script>
                (function() {
                    const originalConsoleLog = console.log;
                    console.log = function(message) {
                        window.parent.handleConsole(message, 'log');
                        originalConsoleLog.apply(console, arguments);
                    };
                    const originalConsoleError = console.error;
                    console.error = function(message) {
                        window.parent.handleConsole(message, 'error');
                        originalConsoleError.apply(console, arguments);
                    };
                    ${jsEditor.value}
                })();
            </script>
        `;

        const output = `${htmlContent}${cssContent}${jsContent}`;
        outputFrame.srcdoc = output;
    } catch (error) {
        handleConsole(error.message, 'error');
    }
}

// Save editor content to localStorage with error handling
function saveContent() {
    try {
        localStorage.setItem('htmlContent', htmlEditor.value);
        localStorage.setItem('cssContent', cssEditor.value);
        localStorage.setItem('jsContent', jsEditor.value);
    } catch (error) {
        handleConsole("Error saving to local storage: " + error.message, 'error');
    }
}

// Load content from localStorage on page load with error handling
function loadContent() {
    try {
        htmlEditor.value = localStorage.getItem('htmlContent') || '';
        cssEditor.value = localStorage.getItem('cssContent') || '';
        jsEditor.value = localStorage.getItem('jsContent') || '';
    } catch (error) {
        handleConsole("Error loading from local storage: " + error.message, 'error');
    }
}

// Auto-complete for basic HTML structure when typing "!" and pressing Enter
htmlEditor.addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && htmlEditor.value.trim() === '!') {
        e.preventDefault();
        htmlEditor.value = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>`;
    }
});

// Auto-complete for lorem typing "lorem" and pressing Enter
htmlEditor.addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && htmlEditor.value.trim().endsWith('lorem')) {
        e.preventDefault();
        
        // Get the current cursor position
        const cursorPosition = htmlEditor.selectionStart;
        
        // Insert the "Lorem ipsum" text at the cursor position
        const textBeforeCursor = htmlEditor.value.substring(0, cursorPosition - 5); // -5 to remove 'lorem'
        const textAfterCursor = htmlEditor.value.substring(cursorPosition);
        const loremText = `Lorem ipsum dolor sit amet consectetur adipisicing elit lorem.`;
        
        htmlEditor.value = textBeforeCursor + loremText + textAfterCursor;
        
        // Move the cursor to the end of the inserted text
        htmlEditor.selectionStart = htmlEditor.selectionEnd = textBeforeCursor.length + loremText.length;
    }
});

// Add event listener to the run button
runButton.addEventListener('click', runCode);

// Event listeners with error handling
runButton.addEventListener('click', () => {
    consoleMessages.innerHTML = ''; // Clear console before each run
    runCode();
});

htmlEditor.addEventListener('input', saveContent);
cssEditor.addEventListener('input', saveContent);
jsEditor.addEventListener('input', saveContent);
window.addEventListener('load', loadContent);

// Responsive code navbar

    //    code sec
    let htmlCode = document.querySelector('.html-code');
    let cssCode = document.querySelector('.css-code');
    let jsCode = document.querySelector('.js-code');

    // nav
    let htmlNav = document.querySelector('.html-nav');
    let cssNav = document.querySelector('.css-nav');
    let jsNav = document.querySelector('.js-nav');

    // Display Html Editor
    htmlNav.addEventListener('click', ()=>{
        cssCode.style.display = "none";
        htmlCode.style.display = "block";
        jsCode.stye.display = "none";
    })

    // Display css Editor
    cssNav.addEventListener('click', ()=>{
        cssCode.style.display = "block";
        htmlCode.style.display = "none";
        jsCode.style.display = "none";
    })

    // Display Js Editor
    jsNav.addEventListener('click', ()=>{
        cssCode.style.display = "none";
        htmlCode.style.display = "none";
        jsCode.style.display = "block";
    })
