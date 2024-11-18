function toggleForm(formName) {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    if (formName === 'login') {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
    } else {
        loginForm.classList.remove('active');
        registerForm.classList.add('active');
    }
}

// Initial setup to show login form by default
document.addEventListener('DOMContentLoaded', () => {
    toggleForm('login');
});

function validateLogin() {
    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;

    if (!username || !password) {
        alert('Please fill out all fields.');
        return false;
    }

    return true;
}

function validateRegister() {
    const username = document.getElementById('register-username').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('register-confirm-password').value;

    if (!username || !email || !password || !confirmPassword) {
        alert('Please fill out all fields.');
        return false;
    }

    const usernamePattern = /^[A-Za-z]{3,}$/;
    if (!usernamePattern.test(username)) {
        alert('Username must be at least 3 characters long and contain only letters.');
        return false;
    }

    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long, and include at least one number, one lowercase letter, one uppercase letter, and one special character.');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    return true;
}
