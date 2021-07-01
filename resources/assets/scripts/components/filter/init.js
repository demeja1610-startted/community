export default function filter() {
    document.querySelector('.article-filter__select')?.addEventListener('change', function(e) {
        e.preventDefault();
        document.querySelector('.article-filter').submit();
    });
}

