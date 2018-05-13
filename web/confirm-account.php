<?php
ini_set("display_errors", true);
error_reporting( E_ALL );

require __DIR__ . '/../vendor/autoload.php';

$view = new Concord\views\ConfirmAccountView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $view->head() ?>
</head>
<body>
<?php echo $view->header() ?>

<p> To complete the sign up process please choose a password!</p>
<form action="/~rayzacha/Concord/account/validate" method="post">
    <input type="hidden" name="validator" value="<?php echo $_GET['v']; ?>">
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="password"/>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="confirm password"/>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Register</button>
</form>

</body>
</html>