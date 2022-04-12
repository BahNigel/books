<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>

<?php

    /*  include banner area  */
        include ('Template/_banner-area.php');
    /*  include banner area  */

    /*  include special price section  */
         include ('Template/_books.php');

?>


<?php
// include footer.php file
include ('footer.php');
?>