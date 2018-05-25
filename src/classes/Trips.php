<?php
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 5/24/18
 * Time: 8:31 PM
 */

namespace Concord\classes;


class Trips extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "trip");
    }

    public function createTrip($userId, $guests, $startDate, $endDate, $created){
        $sql =<<<SQL
INSERT INTO $this->tableName(userid, guests, startDate, endDate, created)
values(?, ?, ?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);

        $ret = $statement->execute(array($userId, $guests, $startDate, $endDate, $created));
        var_dump($ret);
        exit();
    }
}