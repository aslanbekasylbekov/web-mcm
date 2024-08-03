function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const warnings = document.getElementById('warnings');

    if (username === '' || password === '') {
      warnings.innerHTML = 'Please enter both username and password.';
    } else {
      warnings.innerHTML = ''; 
    }
  }