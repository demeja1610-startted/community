export default function filter() {
    let triggers = document.querySelectorAll('.article-filter__select, .article-filter__answer-input');
    for (let i = 0; i < triggers.length; i++) {
        triggers[i]?.addEventListener('change', function(e) {
            e.preventDefault();
            document.querySelector('.article-filter').submit();
        });
    }
}

