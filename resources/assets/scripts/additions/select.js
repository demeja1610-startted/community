import Choices from "choices.js";

export default function customSelect() {
    const select = document.querySelector('.article-filter__select');
    const choices = new Choices(select);
}
