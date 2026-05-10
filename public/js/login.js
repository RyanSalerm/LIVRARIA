document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const token = document.querySelector('input[name="_token"]').value;
  const errorDiv = document.getElementById('error-message');
  const btnText = document.getElementById('btnText');

  errorDiv.style.display = 'none';
  if (!email || !password) {
    errorDiv.textContent = 'Por favor, preencha usuário e senha.';
    errorDiv.style.display = 'block';
    return;
  }

  btnText.textContent = 'Entrando...';

  fetch('/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({ email, password })
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        window.location.href = '/dashboard';
      } else {
        errorDiv.textContent = data.message || 'Usuário ou senha incorretos.';
        errorDiv.style.display = 'block';
        btnText.textContent = 'Entrar';
      }
    })
    .catch(() => {
      errorDiv.textContent = 'Erro ao conectar ao servidor.';
      errorDiv.style.display = 'block';
      btnText.textContent = 'Entrar';
    });
});

// Mostrar/ocultar senha
document.querySelector('.toggle-password').addEventListener('click', () => {
  const password = document.getElementById('password');
  const eyeIcon = document.querySelector('.toggle-password svg');
  if (password.type === 'password') {
    password.type = 'text';
    eyeIcon.innerHTML = `
      <path d="M17.94 17.94A10.45 10.45 0 0 0 21 12c-2.5-4-7.5-7-9-7a8.36 8.36 0 0 0-5.29 1.83"/>
      <path d="M1 1l22 22"/>
      <path d="M9.53 9.53a3 3 0 0 0 4.24 4.24"/>
      <path d="M14.12 14.12a3 3 0 0 1-4.24-4.24"/>
    `;
  } else {
    password.type = 'password';
    eyeIcon.innerHTML = `
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
      <circle cx="12" cy="12" r="3"/>
    `;
  }
});
