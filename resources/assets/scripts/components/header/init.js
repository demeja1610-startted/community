export default function header() {
    let body = document.querySelector('body');
    let mobileMenu = document.querySelector('.mobile-menu');
    let closeMobileMenuButton = document.querySelector('.mobile-menu__close');
    let searchMobileButton = document.querySelector('.header-top__search-mobile');
    let hamburger = document.querySelector('.header-top__hamburger');

    searchMobileButton.addEventListener('click', function() {
        document.querySelector('.header-top__search').classList.toggle('active');
    });

    hamburger.addEventListener('click', function() {
        body.classList.add('overlay');
        mobileMenu.classList.add('open');
    });

    closeMobileMenuButton.addEventListener('click', function () {
        body.classList.remove('overlay');
        mobileMenu.classList.remove('open');
    })
}
