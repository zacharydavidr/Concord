<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new Concord\views\PageNotFoundView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>
<?php echo $view->header(); ?>
<?php echo $view->body(); ?>
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