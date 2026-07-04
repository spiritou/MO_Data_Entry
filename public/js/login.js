/*This page will contain the JavaScript code for the login page. It will handle the form submission, validate the input, and send an AJAX request to the server to authenticate the user.*/

document.getElementById('login-form').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    // Get the input values
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    // Validate the input

    if (!username || !password) {
        alert('Please enter both username and password.');
        return;
    }

    try {
        // Send an AJAX request to the server to authenticate the user
        const response = await fetch('MO_APP/public/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        const result = await response.json();

        if (response.ok) {
            // If authentication is successful, redirect to the dashboard or home page
            window.location.href = 'MO_APP/public/mydashboard';
        } else {
            // If authentication fails, display an error message
            alert(result.message || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('An error occurred. Please try again later.');
    }
});