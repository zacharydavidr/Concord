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
        if($ret == false){
            header("location : /~rayzacha/Concord/error");
        }
    }

    public function getTripsByMonth($month, $year) {
        $startDate = $year . "-" . $month . "-01";

        $lastDay = cal_days_in_month ( CAL_GREGORIAN , $month , $year );
        $endDate = $year . "-" . $month . "-" . $lastDay;

        $sql =<<<SQL
SELECT * 
FROM $this->tableName
WHERE startDate >= ? and startDate <= ?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);


        try {
            $ret = $statement->execute(array($startDate, $endDate));

            if($statement->rowCount() === 0) {
                return array();
            }else{
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            }

        } catch(\PDOException $e) {
            // do something when the exception occurs...
            return null;
        }
    }
}