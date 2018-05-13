<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new \Concord\views\CheckEmailView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
<?php echo $view->header(); ?>
<h1>Almost there!</h1>
<p>Check for a confirmation email sent to <?php echo $_GET['sign-up-email']; ?> and follow the link to complete registration</p>
</body>
</html>