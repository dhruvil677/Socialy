document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Prevent default form submission
    event.preventDefault();
    
    // Redirect to the register page
    window.location.href = "login.html";
});

