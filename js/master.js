// Dark Mode
var darkbtn = document.getElementsByClassName("dark-btn")[0];
var darkModeSt = false;
function darkMode() {
  if (darkModeSt) {
    // Light
    document.body.className = "ligt";
    darkbtn.innerHTML = "Light";
    darkModeSt = false;
  } else {
    // Dark
    document.body.className = "dark";
    darkbtn.innerHTML = "Dark";
    darkModeSt = true;
  }
}

// Button Clicks
// Logo Click
var logo = document.getElementsByClassName("logo")[0];
logo.onclick = function () {
  window.open("#", "_self");
};

// Dark Mode Click
var darkbtn = document.getElementsByClassName("dark-btn")[0];
darkbtn.onclick = function () {
  darkMode();
};

// Login Click
var loginbtn = document.getElementsByClassName("login-btn")[0];
loginbtn.onclick = function () {
  window.open("pages/login.php", "_self");
};

// Search Button Click
var searchbutton = document.getElementsByClassName("search-button")[0];
var date = document.getElementById("date");
var budget = document.getElementById("budget");
var guest = document.getElementById("guest");
searchbutton.onclick = function () {
  var dateSelected = date.selectedIndex;
  var budgetSelected = budget.selectedIndex;
  var guestSelected = guest.selectedIndex;

  if (dateSelected === 0 || budgetSelected === 0 || guestSelected === 0)
    window.alert("Choose Date, Budget, and Number of Guests!");
  else window.open("#best-package", "_self");
};
