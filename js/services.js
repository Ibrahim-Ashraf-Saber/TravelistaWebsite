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

// Select
function showSelected(nav) {
  var selected = nav.selectedIndex;
  if (selected == 1) window.open("#book-trip", "_self");
  else if (selected == 2) window.open("#book-guide", "_self");
  else if (selected == 3) window.open("#trip-table", "_self");
  else if (selected == 4) window.open("#guide-table", "_self");
}

// Logo Click
var logo = document.getElementsByClassName("logo")[0];
logo.onclick = function () {
  window.open("../index.html", "_self");
};
