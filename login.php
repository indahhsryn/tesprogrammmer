<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    h1 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 30px;
    }
    label {
      font-size: 14px;
      color: #555;
      margin-bottom: 8px;
      display: block;
    }
    input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      background-color: #0056b3;
    }
    .message {
      padding: 10px;
      margin-top: 20px;
      border-radius: 4px;
      font-size: 16px;
      text-align: center;
    }
    .success {
      background-color: #d4edda;
      color: #155724;
    }
    .error {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <form id="login-form">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Login</button>
    </form>

    <div id="message" class="message" style="display: none;"></div>
  </div>

  <script>
    const loginForm = document.getElementById('login-form');
    const messageDiv = document.getElementById('message');

    loginForm.addEventListener('submit', async function(event) {
  event.preventDefault(); // Prevent default form submission

  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Clear previous message
  messageDiv.style.display = 'none';

  // Check if username and password are correct
  if (username === 'admin@gmail.com' && password === '12345678900') {
    // Simulate a successful login by saving a token
    const fakeToken = '12345abcde'; 
    localStorage.setItem('token', fakeToken); // Save token in localStorage
    
    messageDiv.style.display = 'block';
    messageDiv.className = 'message success';
    messageDiv.innerText = 'Login successful!';

    // Reset form
    loginForm.reset();
  } else {
    // If credentials are wrong
    messageDiv.style.display = 'block';
    messageDiv.className = 'message error';
    messageDiv.innerText = 'Login failed! Incorrect username or password.';
  }
});

  </script>
</body>
</html>
