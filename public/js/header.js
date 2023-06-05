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
      <a id='assistance' class="nav-link" href="/assistance">Get Assistance</a>
    </li>
    <li class="nav-item">
      <a id='volunteer' class="nav-link" href="/volunteer">Volunteer</a>
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
<a href="#"><div class="triangle-up">
  <i class="fa fa-arrow-up" id="chevron"></i>
</div></a>
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

document.querySelector('.navbar').innerHTML+=navBarCode;
document.querySelector('footer').innerHTML+=footerCode;
