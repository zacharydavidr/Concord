<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new \Concord\views\CalendarView();

$cal = new \Concord\classes\Calendar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
    <link href="/~rayzacha/Concord/web/stylesheets/calendar.css" rel="stylesheet">
</head>

<body>
<?php echo $view->header(); ?>


<div class="container-fluid">
    <div class="row">
<?php echo $cal->showMonth();?>
    </div>

    <div>
        <h3 class="text-left" >Who's at the cottage?</h3>
        <p>Zach: 5/31 to 6/2</p>
    </div>

</div>
</body>
</html>