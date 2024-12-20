<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link
    rel="shortcut icon"
    href="../imgs/fav-icon.webp"
    type="image/x-icon" />
  <!-- Link CSS File -->
  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "TravelistaDB";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $emailErr = $passErr = $success = "";
  $email = $pass = "";
  $hasError = false;

  $stmt = $conn->prepare("SELECT name, email, pass from Users WHERE email = ?");
  $stmt->bind_param("s", $_POST["mail"]);
  $stmt->execute();
  $result = $stmt->get_result();
  $data = $result->fetch_array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["mail"])) {
      $emailErr = "Email is required!";
      $hasError = true;
    } else {
      $email = test_input($_POST["mail"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
        $hasError = true;
      } else {
        if ($result->num_rows == 0) {
          $emailErr = "Email not found!";
          $hasError = true;
        }
      }
    }

    if (empty($_POST["pass"])) {
      $passErr = "Password is required!";
      $hasError = true;
    } else {
      $pass = test_input($_POST["pass"]);

      if ((strlen($pass) < 8) || (strlen($pass) > 16)) {
        $passErr = "Password must be betwwen 8 - 16 characters!";
        $hasError = true;
      }
    }

    if (!$hasError) {
      if ($pass == $data["pass"]) {
        $success = "Login Successfully!";
  ?>
        <script>
          window.open("../home.php", "_self");
        </script>
  <?php
      } else {
        $passErr = "Wrong Password!";
      }

      $stmt->close();
      $conn->close();
    }
  }
  ?>

  <div class="container">
    <div class="left">
      <h2>Your ultimate gateway to exploring the world!</h2>
      <div id="slideshow">
        <img
          src="https://www.roadaffair.com/wp-content/uploads/2017/10/doi-inthanon-national-park-thailand-shutterstock_227684350.jpg"
          class="active" />
        <img
          src="https://www.tripsavvy.com/thmb/xRXwhpK445rYzhwtFvC6dXnKPsY=/4085x2723/filters:fill(auto,1)/railay-thailand-d1baa19e1a3b43c0a6283d23cc455b48.jpg" />
        <img
          src="https://alittlenomad.com/wp-content/uploads/2019/10/panorama-of-cairo.jpg" />
      </div>
      <a href="../index.html">Back to website</a>
    </div>
    <div class="right">
      <div class="right-content">
        <h2>Login</h2>
        <div>
          New here?
          <a href="../pages/signup.php"> Create an account</a>
        </div>
        <form method="post" action="<?php echo (htmlspecialchars($_SERVER["PHP_SELF"])); ?>">
          <input type="email" placeholder="Email" name="mail" value="<?php echo $email; ?>" />
          <div class="error"><?php echo $emailErr; ?></div>
          <input
            type="password"
            placeholder="Password"
            id="pass"
            name="pass"
            value="<?php echo $pass; ?>" />
          <div>
            <div class="error"><?php echo $passErr; ?></div>
            <input type="checkbox" id="showPass" onchange="showPassFun(this)" />
            Show Password
          </div>
          <button type="submit">Login</button>
          <div class="success"><?php echo $success; ?></div>
        </form>
      </div>
    </div>
  </div>
  <!-- Link JS File -->
  <script src="../js/login.js"></script>
</body>

</html>