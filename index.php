<?php require_once("Includes/db_connection.php"); ?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1">

    <link rel="stylesheet" href="Includes/styles.css">

    <title>Welcome!</title>

</head>

<body>
  <button>Register</button>
    <div class="input">
      <input type="text" name="first_name" placeholder="First Name">
      <input type="text" name="last_name" placeholder="Last Name"><br/>
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password"><br/>
      <input type="tel" name="phone_number" size="11" placeholder="Phone Number"><br/>
      <input type="number" name="house_number" placeholder="House Number"><br/>
      <input type="text" name="street_name" placeholder="Street"><br/>
      <input type="text" name="city" placeholder="City"><br/>
      <input type="text" name="postcode" placeholder="Postcode"><br/>
      <input type="submit" name="submit" value="Submit">
    </div>

  <button>Log In</button>
    <div class="input">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password"><br/>
      <input type="submit" name="submit" value="Submit">
    </div>
</body>

<footer></footer>

</html>

<?php
    // close db connection
    mysqli_close($connection);
?>
