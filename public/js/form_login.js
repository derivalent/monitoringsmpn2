function showHide() {
    var inputan = document.getElementById("passwordKu");
    if (inputan.type === "password") {
        inputan.type = "text";
    } else {
        inputan.type = "password";
    }
}



document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let isValid = true;

    const email = document.getElementById('email');
    const password = document.getElementById('passwordKu');

    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    emailError.textContent = '';
    passwordError.textContent = '';

    if (!email.checkValidity()) {
        emailError.textContent = 'Email tidak valid atau kosong.';
        isValid = false;
    }

    if (!password.checkValidity()) {
        passwordError.textContent = 'Password tidak boleh kosong.';
        isValid = false;
    }

    if (isValid) {
        this.submit();
    }
});
