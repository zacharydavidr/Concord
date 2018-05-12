<?php

require_once("../src/views/LoginView.php");

$view = new Concord\views\LoginView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
    <?php echo $view->bootstrapFiles(); ?>
    <?php echo $view->header(); ?>
</body>
</html>