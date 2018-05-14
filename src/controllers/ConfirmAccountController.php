<?php
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 5/13/18
 * Time: 2:17 PM
 */

namespace Concord\controllers;

use Concord\classes\Site;
use Concord\classes\Validators;
use Concord\classes\Users;



class ConfirmAccountController
{

    const INVALID_VALIDATOR = 'validator';
    const INVALID_EMAIL = 'email-invalid';
    const MISMATCH_EMAIL = 'email-mismatch';
    const MISMATCH_PASSWORDS = 'password-mismatch';
    const PASSWORD_LENGTH = 'password-length';


    /**
     * PasswordValidateController constructor.
     * @param Site $site The Site object
     * @param array $post $_POST
     * @param array $session $_SESSION
     */
    public function __construct(Site $site, array $post) {

        $root = $site->getRoot();

        //
        // 1. Ensure the validator is correct! Use it to get the user ID.
        //
        $validators = new Validators($site);
        $validator = strip_tags($post['validator']);
        $email = $validators->get($validator);
        if($email === null) {
            header("location: " .  "$root/account/registration-error?validation-code=$validator&reg-error=" . self::INVALID_VALIDATOR);
            exit();
        }

        //
        // 2. Ensure the email matches the user.
        //
        $validators = new Validators($site);
        $database_email = $validators->getByEmail($email);
        $name = $validators->getNameByEmail($email);

        $firstName = $name['firstName'];
        $lastName = $name['lastName'];

        if($database_email === null) {
            // User does not exist!
            header("location: " . "$root/account/registration-error?validation-code=$validator&reg-error=" . self::INVALID_EMAIL);
            exit();
        }

        //
        // 3. Ensure the passwords match each other
        //
        $password1 = trim(strip_tags($post['password1']));
        $password2 = trim(strip_tags($post['password2']));

        if($password1 !== $password2) {
            // Passwords do not match
            header("location: " . "$root/account/registration-error?validation-code=$validator&reg-error=" . self::MISMATCH_PASSWORDS);
            exit();
        }

        if(strlen($password1) < 4) {
            // Password too short
            header("location: " . "$root/account/registration-error?validation-code=$validator&reg-error=" . self::PASSWORD_LENGTH);
            exit();
        }

        //
        // 4. Create a salted password and save it for the user.
        //
        $users = new Users($site);

        $users->addUser($email, $password1, $firstName, $lastName);

        //
        // 5. Destroy the validator record so it can't be used again!
        //
        $validators->remove($email);

        header("location: " . "$root" . "/account/registration-success/" );
        exit();


    }

    /**
     * Get any redirect link
     * @return mixed Redirect link
     */
    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;

}