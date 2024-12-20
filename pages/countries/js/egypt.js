// Menu
var menu = document.getElementsByClassName("links")[0];
var showMenuSt = false;

function showMenu() {
  if (showMenuSt) {
    // Close
    menu.style.display = "none";
    showMenuSt = false;
  } else {
    // Open
    menu.style.display = "block";
    showMenuSt = true;
  }
}

// Dark Mode
var darkbtn = document.getElementsByClassName("dark-btn")[0];
var menuIcon = document.getElementsByClassName("menu-btn")[0];
var darkModeSt = false;
function darkMode() {
  if (darkModeSt) {
    // Light
    document.body.className = "light";
    darkbtn.innerHTML = "Light";
    menuIcon.style.backgroundImage = "url('../../../imgs/menu-icon-black.svg')";
    darkModeSt = false;
  } else {
    // Dark
    document.body.className = "dark";
    menuIcon.style.backgroundImage = "url('../../../imgs/menu-icon-white.svg')";
    darkbtn.innerHTML = "Dark";
    darkModeSt = true;
  }
}

// Buttons Click
// Logo Click
var logo = document.getElementsByClassName("logo")[0];
logo.onclick = function () {
  window.open("../../../index.html", "_self");
};

// Dark Mode Button
var darkbtn = document.getElementsByClassName("dark-btn")[0];
darkbtn.onclick = function () {
  darkMode();
};

// Menu Button
var menubtn = document.getElementsByClassName("menu-btn")[0];
menubtn.onclick = function () {
  showMenu();
};
