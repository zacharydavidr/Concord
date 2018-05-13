<?php

namespace Concord\classes;

class User
{
    const ADMIN = "A";
    const OWNER = "U";
    const GUEST = "G";

    const SESSION_NAME = 'user';

    private $id;
    private $email;
    private $firstName;
    private $lastName;
    private $joined;
    private $role;

    /**
     * Constructor
     * @param $row Row from the user table in the database
     */
    public function __construct($row) {
        $this->id = $row['id'];
        $this->firstName = $row['firstName'];
        $this->lastName = $row['lastName'];
        $this->email = $row['email'];
        $this->joined = strtotime($row['joined']);
        $this->role = $row['role'];
    }

    /**
     * Determine if user is a staff member
     * @return bool True if user is a staff member
     */
    public function isAdmin() {
        return $this->role === self::ADMIN;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return false|int
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * @param false|int $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}