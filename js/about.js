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

// Menu
var menubtn = document.getElementsByClassName("menu-btn")[0];
menubtn.onclick = function () {
  showMenu();
};

// Logo Click
var logo = document.getElementsByClassName("logo")[0];
logo.onclick = function () {
  window.open("../index.html", "_self");
};
