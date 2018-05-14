<?php
ini_set("display_errors", true);
error_reporting( E_ALL );

require __DIR__ . '/../vendor/autoload.php';

$view = new Concord\views\ConfirmAccountView();

$registrationError = $_GET['reg-error']
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $view->head() ?>
</head>
<body>
<?php echo $view->header() ?>
<?php
    if(is_null($registrationError)){
        echo "<p> To complete the sign up process please choose a password!</p>";
    }elseif($registrationError == \Concord\controllers\ConfirmAccountController::INVALID_EMAIL){
        echo "<p> Couldn't find your validation code, retry link from email. If problems persists
                  restart account registration process. If you continue to have problems after
                  contact Zach personally, you've found and or caused a bug. </p>";
    }elseif($registrationError == \Concord\controllers\ConfirmAccountController::INVALID_VALIDATOR){
        echo "<p> Couldn't match the email associated with this validation code. If problems persists
                  restart account registration process. If you continue to have problems after
                  contact Zach personally, you've found and or caused a bug.</p>";
    }elseif($registrationError == \Concord\controllers\ConfirmAccountController::MISMATCH_PASSWORDS){
        echo "<p> Passwords did not match, please try again.</p>";
    }elseif($registrationError == \Concord\controllers\ConfirmAccountController::PASSWORD_LENGTH){
        echo "<p> Passwords need to be at least 4 characters long, please try again.</p>";
    }
?>
<form action="/~rayzacha/Concord/account/validate" method="post">
    <input type="hidden" name="validator" value="<?php echo $_GET['validation-code']; ?>">
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="password" required/>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="confirm password" required/>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Register</button>
</form>

</body>
</html>