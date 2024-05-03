const form = document.getElementById('login-form');

  // Add event listener to the form
  form.addEventListener('submit', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the email and password values
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Validate email format using regular expression
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Invalid email format');
      return;
    }

    // Validate password length
    if (password.length < 6) {
      alert('Password must be at least 6 characters long');
      return;
    }

    // If email and password are valid, submit the form
    form.submit();
  });