<?php
    include_once 'includes/login_check.php';

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
        <?php
            include_once 'includes/favicons.php';
        ?>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php
            require_once 'includes/loggedin.php';
        ?>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>