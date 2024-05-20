function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passwordToggle = document.getElementById(inputId + '_toggle');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
    }
}