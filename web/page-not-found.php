<?php

require_once("/user/rayzacha/web/Concord/config/global.php");
require_once(BASE_PATH . "/src/views/PageNotFoundView.php");



$view = new Concord\PageNotFoundView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
<?php echo $view->header(); ?>
<?php echo $view->errorMessage(); ?>
<pre>
    <p>GET</p>
    <?php print_r($_GET); ?>
</pre>
<pre>
    <p>POST</p>
    <?php print_r($_POST); ?>
</pre>
<pre>
    <p>SESSION</p>
    <?php print_r($_SESSION); ?>
</pre>
<pre>
    <p>SERVER</p>
    <?php print_r($_SERVER); ?>
</pre>
\
?>

</body>
</html>