<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
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
    .form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
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
    input, textarea {
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
      display: none;
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
  <div class="form-container">
    <h1>Form Input</h1>
    <form id="contact-form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <button type="submit">Submit</button>
    </form>

    <div id="success-message" class="message success">
      <p>Form submitted successfully!</p>
    </div>
    <div id="error-message" class="message error">
      <p>There was an error submitting the form.</p>
    </div>
  </div>

  <script>
    const contactForm = document.getElementById('contact-form');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    // Function to handle form submission
    contactForm.addEventListener('submit', async (event) => {
      event.preventDefault();

      const formData = new FormData(contactForm);
      const formObject = Object.fromEntries(formData);

      // Validate that all fields are filled
      if (!formObject.name || !formObject.email || !formObject.message) {
        alert("All fields are required!");
        return;
      }

      try {
        // Simulate sending data using POST
        const response = await axios.post('https://jsonplaceholder.typicode.com/posts', formObject);

        if (response.status === 201) {
          successMessage.style.display = 'block';
          errorMessage.style.display = 'none';

          // Store data in localStorage
          localStorage.setItem('formData', JSON.stringify(formObject));

          // Clear the form after submission
          contactForm.reset();
        }
      } catch (error) {
        errorMessage.style.display = 'block';
        successMessage.style.display = 'none';
        console.error('Error:', error);
      }
    });
  </script>
</body>
</html>
