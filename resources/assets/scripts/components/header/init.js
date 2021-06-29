export default function header() {
    let body = document.querySelector('.body-wrap');
    let mobileMenu = document.querySelector('.mobile-menu');
    let closeMobileMenuButton = document.querySelector('.mobile-menu__close');
    let searchMobileButton = document.querySelector('.header__search-mobile');
    let hamburger = document.querySelector('.header__hamburger');
    let dropdownOpen = document.querySelector('.categories-menu__edit');

    searchMobileButton.addEventListener('click', function() {
        document.querySelector('.header__search').classList.toggle('active');
    });

    hamburger.addEventListener('click', function() {
        body.classList.add('overlay');
        mobileMenu.classList.add('open');
    });

    closeMobileMenuButton.addEventListener('click', function () {
        body.classList.remove('overlay');
        mobileMenu.classList.remove('open');
    });

    dropdownOpen.addEventListener('click', function () {
        document.querySelector('.categories-menu__dropdown').classList.toggle('active');
    });
}
