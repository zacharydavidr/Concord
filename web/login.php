<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new \Concord\views\LoginView();

$authError = $_GET['auth-error'];

echo $authError;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
    <link href="/~rayzacha/Concord/stylesheets/login.css" rel="stylesheet">
</head>

<body>
<?php echo $view->header(); ?>
<?php echo $view->body(); ?>
<?php
if($authError == \Concord\controllers\LoginController::MISMATCH_EMAIL){
    echo "<p> Incorrect email and or password combination</p>";
}
?>
<p><a href="/~rayzacha/Concord/Forgot-Password/">Forgot Password</a></p>
<p><a href="/~rayzacha/Concord/account/register/">Create Account</a></p>
</body>
</html>
