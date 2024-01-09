// Global Variable 
const menu = document.getElementById('menu');
const btn = document.getElementById('burgerMenu');

// Add Event Listiner 
btn.addEventListener('click', () => {
    menu.classList.toggle("left-0");
})