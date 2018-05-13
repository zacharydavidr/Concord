<?php

namespace Concord\controllers;

use Concord\classes\Site;
use Concord\classes\User;
use Concord\classes\Users;
use Concord\classes\Email;



class NewAccountController
{
    public function __construct(Site $site, $post)
    {
        $email = "";
        $firstName = "";
        $lastName = "";

        if(isset($post['email'])) {
            $email = strip_tags($post['email']);
            $email = trim($email," \t\n\r\0\x0B");
        }
        if(isset($post['first_name'])) {
            $firstName = strip_tags($post['first_name']);
            $firstName = trim($firstName," \t\n\r\0\x0B");
        }
        if(isset($post['last_name'])) {
            $lastName = strip_tags($post['last_name']);
            $lastName = trim($lastName," \t\n\r\0\x0B");
        }


        $row = array('id' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'joined' => null,
            'role' => null
        );
        $user = new User($row);
        $users = new Users($site);
        $mailer = new Email();
        $successful = $users->add($user, $mailer);

        $root = $site->getRoot();
        if($successful) {
            $this->redirect = "$root/account/check-email/$email";
        } else {
            $this->redirect = "$root/account/error/";

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