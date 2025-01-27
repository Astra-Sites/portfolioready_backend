document.addEventListener('DOMContentLoaded', function () {
    const sendButton = document.getElementById('send-button');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    const chatForm = document.getElementById('chat-form');

    chatForm.addEventListener('submit', function (e) {
        e.preventDefault();
        sendMessage();
    });

    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const message = chatInput.value.trim();

        if (message) {
            // Create a new message element for the user
            const userMessageElement = document.createElement('div');
            userMessageElement.classList.add('message', 'user');
            userMessageElement.textContent = message;

            // Append the user message to the chat messages container
            chatMessages.appendChild(userMessageElement);

            // Clear the input
            chatInput.value = '';
            chatInput.focus();

            // Scroll to the latest message
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Send the message to the server via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'chat_handler.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const botMessageElement = document.createElement('div');
                    botMessageElement.classList.add('message', 'bot');
                    botMessageElement.textContent = response.botMessage;
                    chatMessages.appendChild(botMessageElement);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            };
            xhr.send('chat-input=' + encodeURIComponent(message));
        }
    }
});



const chatMessages = document.getElementById('chatMessages');

// Select DOM elements with error handling
function addMessage(text, sender) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message', sender);
    messageDiv.textContent = text;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}



