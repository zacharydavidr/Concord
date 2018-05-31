<?php

require __DIR__ . '/../vendor/autoload.php';



$view = new \Concord\views\CalendarView();

$cal = new \Concord\classes\Calendar($site);
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
        <?php echo $cal->showTrips();?>
    </div>

</div>
</body>
</html>