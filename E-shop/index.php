
	<!DOCTYPE html>
<html>
<head>
<title>E-Italos</title>
</head>
<body>
<?php 
session_start();
include ('myeshop.html');
?>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
 <a href = "products.php"> <img src="iphone.jpg" class="center" style="width="700" height="400"> </a>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
 <a href = "products.php"> <img src="p20.jpg" class="center" style="width="700" height="400"></a>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
 <a href = "products.php"> <img src="xiaomi.jpg" class="center" style="width="700" height="400"> </a>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <a href = "products.php"> <img src="samsung.jpg" class = "center" class="center" style="width="700" height="400"> </a>
  <div class="text"></div>
</div>



</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
   <span class="dot"></span> 
  
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); 
}
</script>



<?php
include ('footer.html');

?>
</body>
</html>




