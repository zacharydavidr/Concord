<?php

require __DIR__ . '/../vendor/autoload.php';

$view = new Concord\views\CreateTripView();

$user = $_SESSION[\Concord\classes\User::SESSION_NAME];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head()?>
</head>

<body>

<?php echo $view->header(); ?>
<form method="post" action="/~rayzacha/Concord/trips/create/">
    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user->getId(); ?>">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label class="control-label" for="arrival_date">Arrival Date</label>
            <input class="form-control" id="arrival_date" name="arrival_date" placeholder="MM/DD/YYY" type="text"/>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label class="control-label" for="departure_date">Departure Date</label>
            <input class="form-control" id="departure_date" name="departure_date" placeholder="MM/DD/YYY" type="text"/>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="guests">Guests</label>
            <input type="text" class="form-control" name="guests" id="guests" placeholder="guests">
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create Trip</button>
</form>
</body>
</html>