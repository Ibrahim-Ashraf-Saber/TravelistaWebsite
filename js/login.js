// Change Image
let currentIndex = 0;
const images = document.querySelectorAll("#slideshow img");
const totalImages = images.length;
function showNextImage() {
  images[currentIndex].classList.remove("active");
  currentIndex = (currentIndex + 1) % totalImages;
  images[currentIndex].classList.add("active");
}
setInterval(showNextImage, 3000);

// Show Password
var pass = document.getElementById("pass");
function showPassFun(showPass) {
  if (showPass.checked) {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}

// Signup -> Show Password
var pass1 = document.getElementsByClassName("pass")[0];
var pass2 = document.getElementsByClassName("cpass")[0];
var passStat = false;

function showPass() {
  if (passStat) {
    pass1.type = "password";
    pass2.type = "password";
    passStat = false;
  } else {
    pass1.type = "text";
    pass2.type = "text";
    passStat = true;
  }
}
