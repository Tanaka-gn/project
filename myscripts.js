// Connecting to the about us
document.getElementById('read-more').addEventListener('click', function() {
    window.location.href = 'aboutus.php';
});

// Connecting to the service
const serviceButtons = document.querySelectorAll('.serviceknowmore');
serviceButtons.forEach(button => {
    button.addEventListener('click', function() {
        window.location.href = 'service.php';
    });
});

// Add event listeners to the navigation items
const navItems = document.querySelectorAll('nav ul li');
navItems[0].addEventListener('click', function() {
    window.location.href = 'home.php';
});

navItems[1].addEventListener('click', function() {
    window.location.href = 'aboutus.php';
});

navItems[2].addEventListener('click', function() {
    window.location.href = 'service.php';
});

navItems[3].addEventListener('click', function() {
    window.location.href = 'contactus.php';
});

navItems[4].addEventListener('click', function() {
    window.location.href = 'projects.php';
});

navItems[5].addEventListener('click', function() {
    window.location.href = 'purchase.php';
});

// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//menu-toggle
document.getElementById('menu-toggle').addEventListener('click', function() {
    document.getElementById('nav-links').classList.toggle('show');
});

