export default function header() {
    let searchMobileButton = document.querySelector('.header-top__search-mobile');
    searchMobileButton.addEventListener('click', function() {
        console.log('click');
        document.querySelector('.header-top__search').classList.toggle('active');
    })
}
