function appendMessage(message, sender) {
    const chatbox = document.getElementById('chatbox');
    const newMessage = document.createElement('div');
    newMessage.className = 'chat-message ' + sender;
    newMessage.innerHTML = `<p>${message}</p>`;
    chatbox.appendChild(newMessage);
    chatbox.scrollTop = chatbox.scrollHeight;
}

function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    if (userInput.trim() === '') return;

    appendMessage(userInput, 'user');

    fetch('https://api.openai.com/v1/engines/davinci-codex/completions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer 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',
        },
        body: JSON.stringify({
            prompt: userInput,
            max_tokens: 150,
        }),
    })
    .then(response => response.json())
    .then(data => {
        const aiResponse = data.choices[0].text.trim();
        appendMessage(aiResponse, 'bot');
    })
    .catch(error => console.error('Error:', error));

    document.getElementById('userInput').value = '';
}
