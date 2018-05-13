<?php

namespace Concord\classes;

class Validators extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "validator");
    }

    /**
     * Create a new validator and add it to the table.
     * @param $email User this validator is for.
     * @return The new validator.
     */
    public function newValidator($email, $firstName, $lastName) {
        $validator = $this->createValidator();

        // Write to the table
        $sql =<<<SQL
INSERT INTO $this->tableName(validator, email, firstName, lastName ,date) 
VALUES (?,?,?,?,now())
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($validator, $email, $firstName, $lastName ));
            if($statement->rowCount() === 0) {

            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
        }

        return $validator;
    }

    /**
     * Generate a random validator string of characters
     * @param $len Length to generate, default is 32
     * @returns Validator string
     */
    public function createValidator($len = 32) {
        $bytes = openssl_random_pseudo_bytes($len / 2);
        return bin2hex($bytes);
    }

    /**
     * Determine if a validator is valid. If it is,
     * return the user ID for that validator.
     * @param $validator Validator to look up
     * @return User ID or null if not found.
     */
    public function get($validator) {

        // Write to the table
        $sql =<<<SQL
SELECT email 
FROM $this->tableName
WHERE validator = ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($validator));

            if($statement->rowCount() === 0) {
                return null;
            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return null;
        }

        return $statement->fetch(\PDO::FETCH_ASSOC)['email'];
    }

    /**
     * Remove any validators for this user ID.
     * @param $userId The USER ID we are clearing validators for.
     */
    public function remove($userId) {
        // Write to the table
        $sql =<<<SQL
DELETE FROM $this->tableName 
WHERE userid = ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($userId));

            if($statement->rowCount() === 0) {
                return null;
            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return null;
        }

        return true;

    }

    public function getNameByEmail($email) {

        // Write to the table
        $sql =<<<SQL
SELECT firstName, lastName 
FROM $this->tableName
WHERE email = ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($email));

            if($statement->rowCount() === 0) {
                return null;
            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return null;
        }

        $validator = $statement->fetch(\PDO::FETCH_ASSOC);
        $firstName = $validator['firstName'];
        $lastName = $validator['lastName'];

        $name = array('firstName' =>$firstName, 'lastName' =>$lastName);

        return $name;
    }
    public function getByEmail($email) {

        // Write to the table
        $sql =<<<SQL
SELECT email 
FROM $this->tableName
WHERE email = ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            $ret = $statement->execute(array($email));

            if($statement->rowCount() === 0) {
                return null;
            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return null;
        }

        return $statement->fetch(\PDO::FETCH_ASSOC)['email'];
    }



}