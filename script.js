
let LoginForm = document.querySelector('.login-form');
document.querySelector('#login-btn').onclick = () =>
{
    LoginForm.classList.toggle('active');
    
    ShoppingCart.classList.remove('active');
    searchForm.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>
{
    navbar.classList.toggle('active');
    LoginForm.classList.remove('active');
    ShoppingCart.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>
{
    searchForm.classList.remove('active');
    ShoppingCart.classList.remove('active');
    LoginForm.classList.remove('active');
    navbar.classList.remove('active');
}

