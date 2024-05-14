const mobileMenuIcon = document.querySelector('.mobile-menu-icon');
const mobileMenuContainer = document.querySelector('.mobile-menu-container');

function toggleMobileMenu() {
    mobileMenuContainer.classList.toggle('show-menu');
}

mobileMenuIcon.addEventListener('click', toggleMobileMenu);