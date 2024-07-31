document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidade do formulário de contato
    const form = document.getElementById('contactForm');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }

    // Animação suave de rolagem para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Toggle para menu responsivo
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', () => {
            navbarCollapse.classList.toggle('show');
        });
    }

    // Animação do ícone Ionicons no hover
    const logoIcon = document.querySelector('.navbar-brand ion-icon');
    if (logoIcon) {
        logoIcon.addEventListener('mouseover', () => {
            logoIcon.setAttribute('name', 'build'); // Muda para o ícone sólido no hover
        });
        logoIcon.addEventListener('mouseout', () => {
            logoIcon.setAttribute('name', 'build-outline'); // Volta para o ícone outline
        });
    }

    // Lazy loading para imagens
    if ('IntersectionObserver' in window) {
        const imgObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img.lazy').forEach(img => {
            imgObserver.observe(img);
        });
    }

    // Adiciona classe 'active' aos itens do menu quando a seção correspondente está visível
    const sections = document.querySelectorAll('section');
    const navItems = document.querySelectorAll('.navbar-nav .nav-item');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.querySelector('a').getAttribute('href') === `#${current}`) {
                item.classList.add('active');
            }
        });
    });
});

function handleFormSubmit(e) {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    if (name === '' || email === '' || message === '') {
        showAlert('Por favor, preencha todos os campos.', 'danger');
        return;
    }

    if (!isValidEmail(email)) {
        showAlert('Por favor, insira um e-mail válido.', 'danger');
        return;
    }

    // Aqui você pode adicionar o código para enviar o formulário
    showAlert('Formulário enviado com sucesso!', 'success');
    e.target.reset();
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function showAlert(message, type) {
    const alertPlaceholder = document.getElementById('alertPlaceholder');
    const wrapper = document.createElement('div');
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('');

    alertPlaceholder.append(wrapper);

    // Remove a alerta após 5 segundos
    setTimeout(() => {
        wrapper.remove();
    }, 5000);
}