export default function authModal() {
    let body = document.querySelector('.body-wrap');
    let openAuthModalButton = document.querySelector('.header__signin');
    let modal = document.querySelector('.auth-modal');

    openAuthModalButton.addEventListener('click', function() {
        body.classList.add('overlay');
        modal.classList.add('active');
    });
}
