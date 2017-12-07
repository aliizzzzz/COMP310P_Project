<?php require_once("includes/db_connection.php"); ?>
<?php include("includes/header.php");?>



<body>
    <div id="main">
        <div id="register">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name"><br/>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password"><br/>
            <input type="tel" name="phone_number" size="11" placeholder="Phone Number"><br/>
            <input type="number" name="house_number" placeholder="House Number"><br/>
            <input type="text" name="street_name" placeholder="Street"><br/>
            <input type="text" name="city" placeholder="City"><br/>
            <input type="text" name="postcode" placeholder="Postcode"><br/>
            <input type="submit" name="submit" value="Register">
        </div>
    </div>
</body>

<?php include("includes/footer.php");?>
