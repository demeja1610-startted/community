export function inputFile() {
    let inputs = document.querySelectorAll('.custom-file');

    inputs.forEach(wrapper => {
        let input = wrapper.querySelector('input');
        let fileNames = wrapper.querySelector('.custom-file__names');
        let prevText = fileNames.innerHTML;

        input.addEventListener('change', () => {
            if (input.files.length !== 0) {
                let names = '';

                for (var i = 0; i < input.files.length; i++) {
                    names += input.files[i].name;
                    names += i < input.files.length - 1 ? ', ' : '';
                }

                fileNames.innerHTML = names;
            } else {
                fileNames.innerHTML = prevText;
            }
        });
    });
}
