</body>
<footer>

    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><p><span>&#9400;</span> Bright Tutors, <?php echo date("Y"); ?></p>

</footer>

</html>

<?php
    // close db connection
    if(isset($connection)){
    mysqli_close($connection);
    }
?>
