const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', () => {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
});

const loginForm = document.getElementById('loginForm');
const message = document.getElementById('message');

loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const emailValue = document.getElementById('email').value;
  const passwordValue = password.value;

  if (emailValue === "admin@example.com" && passwordValue === "admin") {
    message.style.color = "green";
    message.textContent = "Login berhasil!";
  } else {
    message.style.color = "red";
    message.textContent = "Email atau password salah!";
  }
});
