<?php

require_once("/user/rayzacha/web/Concord/config/global.php");
require_once(BASE_PATH . "/src/views/LoginView.php");

$view = new Concord\LoginView();
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