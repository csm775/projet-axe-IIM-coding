const menuHamburger = document.querySelector(".hamburger")
const navLinks = document.querySelector(".nav-links ul")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
})

