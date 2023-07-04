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
    <a href="https://www.facebook.com/OxyrichPakistan/" class="fa fa-facebook"></a>
    <a href="#" class="fa" id="instagram">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="512" height="512">
    <g>
    <path d="M12,2.162c3.204,0,3.584,0.012,4.849,0.07c1.308,0.06,2.655,0.358,3.608,1.311c0.962,0.962,1.251,2.296,1.311,3.608   c0.058,1.265,0.07,1.645,0.07,4.849c0,3.204-0.012,3.584-0.07,4.849c-0.059,1.301-0.364,2.661-1.311,3.608   c-0.962,0.962-2.295,1.251-3.608,1.311c-1.265,0.058-1.645,0.07-4.849,0.07s-3.584-0.012-4.849-0.07   c-1.291-0.059-2.669-0.371-3.608-1.311c-0.957-0.957-1.251-2.304-1.311-3.608c-0.058-1.265-0.07-1.645-0.07-4.849   c0-3.204,0.012-3.584,0.07-4.849c0.059-1.296,0.367-2.664,1.311-3.608c0.96-0.96,2.299-1.251,3.608-1.311   C8.416,2.174,8.796,2.162,12,2.162 M12,0C8.741,0,8.332,0.014,7.052,0.072C5.197,0.157,3.355,0.673,2.014,2.014   C0.668,3.36,0.157,5.198,0.072,7.052C0.014,8.332,0,8.741,0,12c0,3.259,0.014,3.668,0.072,4.948c0.085,1.853,0.603,3.7,1.942,5.038   c1.345,1.345,3.186,1.857,5.038,1.942C8.332,23.986,8.741,24,12,24c3.259,0,3.668-0.014,4.948-0.072   c1.854-0.085,3.698-0.602,5.038-1.942c1.347-1.347,1.857-3.184,1.942-5.038C23.986,15.668,24,15.259,24,12   c0-3.259-0.014-3.668-0.072-4.948c-0.085-1.855-0.602-3.698-1.942-5.038c-1.343-1.343-3.189-1.858-5.038-1.942   C15.668,0.014,15.259,0,12,0z"/>
    <path d="M12,5.838c-3.403,0-6.162,2.759-6.162,6.162c0,3.403,2.759,6.162,6.162,6.162s6.162-2.759,6.162-6.162   C18.162,8.597,15.403,5.838,12,5.838z M12,16c-2.209,0-4-1.791-4-4s1.791-4,4-4s4,1.791,4,4S14.209,16,12,16z"/>
    <circle cx="18.406" cy="5.594" r="1.44"/>
    </g>
    </svg>
    </a>
    <a href="#" class="fa fa-twitter"></a>
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