function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    // Alterna entre mostrar e esconder a senha
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.setAttribute('stroke', 'currentColor'); // Altere para o ícone aberto, se necessário
    } else {
        passwordField.type = 'password';
        eyeIcon.setAttribute('stroke', 'gray'); // Mude para o ícone fechado
    }
}
