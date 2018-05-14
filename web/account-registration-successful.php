<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new \Concord\views\AccountRegistrationSuccess();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
<?php echo $view->header(); ?>
<h1>Finished!</h1>
<p>Your account has been registered!</p>
<p>Return to the <a href="/~rayzacha/Concord/login/">login page</a></p>
</body>
</html>