const togglePassword = document.getElementById('togglePassword');
togglePassword.addEventListener('click', () => {
  const password = document.getElementById('password');
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
});