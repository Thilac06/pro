const slidesContainer = document.querySelector('.slides-container');
const slides = document.querySelectorAll('.slide');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

let currentIndex = 0;

function showSlide(index) {
  slides.forEach((slide, idx) => {
    slide.style.display = idx === index ? 'block' : 'none';
  });
}

function showPreviousSlide() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = slides.length - 1;
  }
  showSlide(currentIndex);
}

function showNextSlide() {
  currentIndex++;
  if (currentIndex >= slides.length) {
    currentIndex = 0;
  }
  showSlide(currentIndex);
}

prevButton.addEventListener('click', showPreviousSlide);
nextButton.addEventListener('click', showNextSlide);

// Show the first slide initially
showSlide(currentIndex);

document.getElementById('contactForm').addEventListener('submit', function(event) {
  event.preventDefault();
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const complaint = document.getElementById('complaint').value;

  const subject = 'Complaint from ' + name;
  const body = 'Email: ' + email + '\n\nComplaint: ' + complaint;

  // Using mailto: to open the user's default email client with the complaint details
  window.location.href = 'mailto:thilacramesh@gmail.com?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
});

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
