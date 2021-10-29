//Login
const inputs = document.querySelectorAll('.input');

function addFocus() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function removeFocus() {
    let parent = this.parentNode.parentNode;
    if(this.value == "") {
        parent.classList.remove('focus');
    }
}

function handleInput() {
    let parent = this.parentNode.parentNode;
    if (this.value.length > 0) {
        parent.classList.add('focus');
    } else {
        parent.classList.remove('focus');
    }

}

inputs.forEach(input =>{
    input.addEventListener('focus', addFocus);
    input.addEventListener('blur', removeFocus);
    input.addEventListener('input', handleInput);
});
