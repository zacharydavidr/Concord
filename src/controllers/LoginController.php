<?php

namespace Concord;

require_once("/user/rayzacha/web/Concord/config/global.php");
require_once(BASE_PATH . "/src/classes/Users.php");


/**
 * Class LoginController
 * @package Concord\controllers
 */
class LoginController
{
    public function __construct(Site $site, array &$session, array $post) {
        // Create a Users object to access the table
        $users = new Users($site);

        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);
        $user = $users->login($email, $password);

        $session[User::SESSION_NAME] = $user;

        $root = $site->getRoot();

        if($user === null) {
            // Login failed
            $this->redirect = "$root/error.php";
        } else {
            $this->redirect = "$root/successful.php";

        }
    }


    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
    ///
    private $redirect;
}