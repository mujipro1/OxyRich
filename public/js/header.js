navBarCode = `
<div class="container">
<a class="navbar-brand" href="/home"><img src="images/logo.png"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

  <input type="checkbox" name="toggle-menu" id="toggle-menu">
  <label for="toggle-menu" type="button" class="toggle-btn">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </label>

</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a id='home' class="nav-link" href="/home">Home</a>
    </li>
    <li class="nav-item">
      <a id='login' class="nav-link" href="/login">Login</a>
    </li>
    <li class="nav-item">
      <a id='aboutUs' href='/aboutUs' class="nav-link">About Us</a>
    </li>
    <li class="nav-item">
      <a id='contact' class="nav-link" href="/contact">Contact</a>
    </li>
  </ul>
</div>
</div>
`

footerCode=`
<div class="footer_left"></div>
<div class="footer_middle">
<div class="triangle-up">
  <i class="fa fa-arrow-up" id="chevron"></i>
</div>
  <div>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google-plus"></a>
    <a href="#" class="fa fa-linkedin"></a>
  </div>
  <p class="footer_text">
    Copyright © 2023 • Don't claim as your own.
  </p>
</div>
<div class="footer_left"></div>
</footer>
`
document.addEventListener('DOMContentLoaded', () => {
const scrollToTopButton = document.querySelector('.triangle-up');
  scrollToTopButton.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});


nav2Code = `
<div class="container">
<a class="navbar-brand" href="/home"><img src="images/logo.png"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

  <input type="checkbox" name="toggle-menu" id="toggle-menu">
  <label for="toggle-menu" type="button" class="toggle-btn">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </label>

</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a id='dashboard' class="nav-link" href="/dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
      <a id='invoices' class="nav-link" href="/invoices">Invoices</a>
    </li>
    <li class="nav-item">
    <a id='contact' class="nav-link" href="/contact">Contact</a>
    </li>
    <li class="nav-item">
      <a id='logout' href='/logout' class="nav-link">Logout</a>
    </li>
  </ul>
</div>
</div>
`
nav3Code = `
<div class="container">
<a class="navbar-brand" href="/home"><img src="images/logo.png"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

  <input type="checkbox" name="toggle-menu" id="toggle-menu">
  <label for="toggle-menu" type="button" class="toggle-btn">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </label>

</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a id='dashboard' class="nav-link" href="/dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
    <a id='contact' class="nav-link" href="/contact">Contact</a>
    </li>
    <li class="nav-item">
      <a id='logout' href='/logout' class="nav-link">Logout</a>
    </li>
  </ul>
</div>
</div>
`
navbar = document.querySelector('.navbar');

if (navbar.classList.contains('nav2')) {
  navbar.innerHTML+=nav2Code;
}
else if (navbar.classList.contains('nav3')) {
  navbar.innerHTML+=nav3Code;
}
else{
  navbar.innerHTML+=navBarCode;
}



document.querySelector('footer').innerHTML+=footerCode;

document.addEventListener('DOMContentLoaded', function() {
  var errorMessage = document.querySelector('.alert');
  if(errorMessage != null){
      errorMessage.classList.add('show');
      var duration = 9000; 
      setTimeout(function() {
          errorMessage.classList.remove('show');
      }, duration);
  }
});