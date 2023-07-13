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
<div class="d-flex justify-content-center">
  <div>
    <a href="https://www.facebook.com/OxyrichPakistan/" class="fa fa-facebook"></a>
    </div>
    <div>
    <a  class="fa contactfoot" href='/contact'>
    
    <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" viewBox="0 0 24 24" width="512" height="512"><path d="M5,22a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2V11a7,7,0,0,1,14,0v1a2,2,0,0,0-2,2v6H14a1,1,0,0,0,0,2h5a5,5,0,0,0,2-9.576V11A9,9,0,0,0,3,11v1.424A5,5,0,0,0,5,22Z"/></svg>

    </a>
  </div>
  </div>
  <div class='text-center'>
    <h5 class='footer-text muted mt-3'> OxyRich Pakistan </h5>
      <p class=' muted'>Copyright © ` + Date().split(' ')[3] + ` All rights reserved.</p>
  </div>
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
      <a id='dashboard' class="nav-link" href="/dashboardA">Dashboard</a>
    </li>
     <li class="nav-item">
      <a id='logout' href='/logoutAdmin' class="nav-link">Logout</a>
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
      <a id='dashboard' class="nav-link" href="/dashboardE">Dashboard</a>
    </li>
    <li class="nav-item">
      <a id='logout' href='/logoutEmployee' class="nav-link">Logout</a>
    </li>
  </ul>
</div>
</div>
`

nav4Code = `
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
      <a id='dashboard' class="nav-link" href="/dashboardC">Dashboard</a>
    </li>
    <li class="nav-item">
      <a id='logout' href='/logoutCustomer' class="nav-link">Logout</a>
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
else if(navbar.classList.contains('nav4')) {
  navbar.innerHTML+=nav4Code;
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



// input validation

const numberInputs = document.querySelectorAll('input[type="number"]');
// change type to text to prevent number input from showing arrows
numberInputs.forEach((input) => {
  input.type = 'text';
});

numberInputs.forEach((input) => {
  input.addEventListener('keyup', () => {
        const value = parseFloat(input.value);

        // Check if the value is negative
        if (value < 0) {
            input.value = value * -1;
            // You can also show an error message here
            // Example: document.getElementById('error-message').textContent = 'Negative numbers are not allowed';
        }
    });
});