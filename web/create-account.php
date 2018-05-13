<?php

require_once("/user/rayzacha/web/Concord/config/global.php");
require_once(BASE_PATH . "/src/views/CreateAccountView.php");

$view = new Concord\CreateAccountView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
<?php echo $view->header(); ?>
<?php echo $view->body(); ?>
</body>
</html>

