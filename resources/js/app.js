require('./bootstrap');

require('alpinejs');

import { createApp } from "vue"

createApp({
   components: {}
}).mount('#app');



//Menu toggle

let toggleBtn = document.querySelector('.toggle');
let navbar = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggleBtn.onclick = () => {
    navbar.classList.toggle('active');
    main.classList.toggle('active');
};
