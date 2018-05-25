<?php
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 5/24/18
 * Time: 8:50 PM
 */

namespace Concord\controllers;


use Concord\classes\Trips;
use Concord\classes\Site;


class CreateTripController
{
    public function __construct(Site $site, $post)
    {
        $userId = "";
        $startDate = "";
        $endDate = "";
        $guests = "";

        if(isset($post['user_id'])) {
            $userId = strip_tags($post['user_id']);
            $userId = trim($userId," \t\n\r\0\x0B");
        }
        if(isset($post['arrival_date'])) {
            $startDate = strip_tags($post['start_date']);
            $startDate = trim($startDate," \t\n\r\0\x0B");
        }
        if(isset($post['departure_date'])) {
            $endDate = strip_tags($post['end_date']);
            $endDate = trim($endDate," \t\n\r\0\x0B");
        }
        if(isset($post['guests'])) {
            $guests = strip_tags($post['guests']);
            $guests = trim($guests," \t\n\r\0\x0B");
        }

        $trips = new Trips($site);

        $startDate = date("Y-m-d H:i:s");
        $endDate = date("Y-m-d H:i:s");
        $created = date("Y-m-d H:i:s");
        $trips->createTrip($userId, $guests, $startDate, $endDate, $created);

        $root = $site->getRoot();
        $this->redirect = "$root/calendar/";
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