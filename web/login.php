<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new \Concord\views\LoginView();

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
</body>
</html>
