$(document).ready(function(){
  $('.slider').slick({
    dots: false,
    arrows: true,
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });
  var nextButton = $('.slick-next');
  var prevButton = $('.slick-prev');

  // Apply custom CSS styles to the slick-next button
  nextButton.css({
    'right': '0',
    'position' :'absolute',
    'width' : '50px',
    'height' : '50px',
    'marginTop' : '-125px',
    'border' : 'none',
    'borderRadius' : '50%'
  });

  // Apply custom CSS styles to the slick-prev button
  prevButton.css({
    'left': '0',
    'position' :'absolute',
    'width' : '50px',
    'height' : '50px',
    'marginTop' : '0px',
    'border' : 'none',
    'borderRadius' : '50%'
  });
});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slider")[0].getElementsByTagName("img");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}


document.querySelector('form').addEventListener('submit', function(event) {
  // Loop through the input fields and check the values
  var inputs = document.querySelectorAll('input[name^="quantity"]');
  for (var i = 0; i < inputs.length; i++) {
    var value = inputs[i].value;
    if (isNaN(value) || value < 0) {
      // If the value is not valid, prevent the form submission and display an error message
      event.preventDefault();
      alert('Invalid quantity: ' + value);
      break;
    }
  }
});


