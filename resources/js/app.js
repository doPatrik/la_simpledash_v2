require('./bootstrap');

require('alpinejs');

import { createApp } from "vue"
import FormBuilderComponent from "./components/FormBuilder/FormBuilderComponent";
import BaseInputComponent from "./components/FormBuilder/Inputs/BaseInputComponent";
import DataTableComponent from "./components/DataTable/DataTableComponent";

const app = createApp({});
app.config.compilerOptions.isCustomElement = tag => tag === 'ion-icon';
app.component('FormBuilderComponent', FormBuilderComponent);
app.component('BaseInputComponent', BaseInputComponent);
app.component('DataTableComponent', DataTableComponent);
const mountedApp = app.mount('#app');


//Menu toggle

let toggleBtn = document.querySelector('.toggle');
let navbar = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggleBtn.onclick = () => {
    navbar.classList.toggle('active');
    main.classList.toggle('active');
};
