const togglePassword = document.getElementById('togglePassword');
togglePassword.addEventListener('click', () => {
  const password = document.getElementById('password');
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
});

// Removed form submit handler to prevent intercepting login.
// const loginForm = document.getElementById('loginForm');
// const message = document.getElementById('message');
// loginForm.addEventListener('submit', (e) => {
//   e.preventDefault();
//   // ...existing code...
// });
