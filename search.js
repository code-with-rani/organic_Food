 

 
var ShoppingCart = document.querySelector('.shopping-cart');
 
var navbar = document.querySelector('.navbar');
 


document.querySelector('#cart-btn').onclick = () =>
{
    ShoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    LoginForm.classList.remove('active');
    navbar.classList.remove('active');
}


 

document.querySelector('#menu-btn').onclick = () =>
{
    navbar.classList.toggle('active');
    LoginForm.classList.remove('active');
    ShoppingCart.classList.remove('active');
    searchForm.classList.remove('active');
}

window.scroll = () =>
{
    searchForm.classList.remove('active');
    ShoppingCart.classList.remove('active');
    LoginForm.classList.remove('active');
    navbar.classList.remove('active');
}

