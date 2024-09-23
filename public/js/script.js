//########## INICIO MODO DARK TAILWIND ##########
document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');

    // Função para atualizar o tema
    function updateTheme() {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    // Atualiza o tema ao carregar a página
    updateTheme();

    // Adiciona um ouvinte de evento ao botão
    themeToggleBtn.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
            document.getElementById('logo').style.filter = "invert(0%)";
        } else {
            document.getElementById('logo').style.filter = "invert(100%)";
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    });
});
//########## FIM MODO DARK TAILWIND ##########