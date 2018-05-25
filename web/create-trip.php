<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new Concord\views\CreateTripView();

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