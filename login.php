<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php include("includes/header.php");?>

<div id="main">


    <div id="logIn">
        <input type="email" name="email" placeholder="Email"><br/>
        <input type="password" name="password" placeholder="Password"><br/>
        <input type="submit" name="submit" value="Log In">
    </div>
</div>
<?php include("includes/footer.php");?>
