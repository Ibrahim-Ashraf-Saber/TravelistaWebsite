<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign-Up</title>
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

  $nameErr = $emailErr = $passErr = $cPassErr = $termsErr = $success = "";
  $name = $email = $pass = $cpass = "";
  $hasError = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required!";
      $hasError = true;
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed!";
        $hasError = true;
      }
    }

    if (empty($_POST["mail"])) {
      $emailErr = "Email is required!";
      $hasError = true;
    } else {
      $email = test_input($_POST["mail"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
        $hasError = true;
      } else {
        $stmt = $conn->prepare("SELECT email from Users WHERE email = ?");
        $stmt->bind_param("s", $_POST["mail"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          $emailErr = "Email already exists!";
          $hasError = true;
        }
        $stmt->close();
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
      } else {
        if (($_POST["pass"]) !== ($_POST["cpass"])) {
          $cPassErr = "Passwords do not match!";
          $hasError = true;
        } else {
          $cpass = test_input($_POST["pass"]);
        }
      }
    }

    if (!isset($_POST["terms"])) {
      $termsErr = "You must accept the terms and conditions!";
      $hasError = true;
    }

    if (!$hasError) {
      $stmt = $conn->prepare("INSERT INTO Users (name, email, pass) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $pass);
      $stmt->execute();

      if ($stmt->error) {
        $success = "Error: " . $stmt->error;
      } else {
        $success = "Data inserted successfully!";
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
          src="https://s3-us-west-1.amazonaws.com/contentlab.studiod/getty/ffa503ca336e40d8a1d4bfbfcf9f1df7"
          class="active" />
        <img
          src="https://www.billingschamber.com/media/Entrance-of-Luxor-Temple-Egypt-iStock-175526084.jpg" />
        <img
          src="https://alittlenomad.com/wp-content/uploads/2019/10/panorama-of-cairo.jpg" />
      </div>
      <a href="../index.html">Back to website</a>
    </div>
    <div class="right">
      <div class="right-content">
        <h2>Create New Account</h2>
        <div>Already have an account? <a href="#">Login</a></div>
        <form method="post" action="<?php echo (htmlspecialchars($_SERVER["PHP_SELF"])); ?>">
          <input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>">
          <div class="error"><?php echo $nameErr; ?></div>
          <input type="text" placeholder="Email" name="mail" value="<?php echo $email; ?>">
          <div class="error"><?php echo $emailErr; ?></div>
          <input type="password" class="pass" placeholder="Password" name="pass" value="<?php echo $pass; ?>">
          <div class="error"><?php echo $passErr; ?></div>
          <input type="password" class="cpass" placeholder="Confirm Password" name="cpass" value="<?php echo $cpass; ?>">
          <div class="error"><?php echo $cPassErr; ?></div>
          <div class="check">
            <input type="checkbox" name="terms" <?php if (isset($_POST["terms"])) echo "checked"; ?>>
            I agree to the <a href="#"> Terms & Conditions</a>
          </div>
          <div class="error"><?php echo $termsErr; ?></div>
          <button type="submit">Create Account</button>
          <div class="success"><?php echo $success; ?></div>
          <div class="pass-icon1" onclick="showPass()"></div>
        </form>
      </div>
    </div>
  </div>
  <!-- Link JS File -->
  <script src="../js/login.js"></script>
</body>

</html>