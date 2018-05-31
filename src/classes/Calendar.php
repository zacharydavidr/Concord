<?php
// http://php.net/manual/en/function.date.php

namespace Concord\classes;


class Calendar
{
    private $month;
    private $year;
    private $weekdayLabels = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
    private $selectedDate;
    private $site;

    /**
     * Calendar constructor.
     */
    public function __construct(Site $site){
        $this->month = date("n");
        $this->year = date("Y");
        $this->day = date("j");
        $this->selectedDate = date("Y-n-j");
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function showMonth(){

        //See if we are looking at a different
        if(isset($_GET['month']) && isset($_GET['year']) && isset($_GET['day'])) {
            $this->month = $_GET['month'];
            $this->year = $_GET['year'];
            $this->day = $_GET['day'];
            $this->selectedDate = $this->year ."-".$this->month."-".$this->day;
        }else{
            $this->month = date("n");
            $this->year = date("Y");
            $this->day = date("j");
            $this->selectedDate = $this->year ."-".$this->month."-".$this->day;

        }

        // date information
        $firstDayIdx = $this->getFirstDayOfMonthIndex($this->month,$this->year);
        $totalDayCnt = $this->getNumDaysInMonth($this->month,$this->year);

        $html = $this->getCalendarHeader($this->month,$this->year);

        // Start Table
        $html .= "<table class='table'>";

        // Table Headers
        foreach($this->weekdayLabels as $weekday){
            $html .= "<th>".$weekday."</th>";
        }

        // Table Cells
        $currentDay = 0;
        $boundaryIdx = 0;
        for($weekIdx = 0; $weekIdx < $this->getNumOfWeeksInMonth($this->month, $this->year); $weekIdx++){
            $html .= "<tr>";
            for($dayIdx = 1; $dayIdx <= 7; $dayIdx++) {
                $html .= "<td>";
                if($boundaryIdx >= $firstDayIdx && $currentDay<$totalDayCnt){
                    $html .= $this->generateDay($currentDay);
                    $currentDay++;
                    $boundaryIdx++;
                }else{
                    $boundaryIdx++;
                }
                $html .= "</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function generateDay($currentDay){
        $day = $currentDay + 1;
        $dateHref = "?year=" . $this->year . "&month=" . $this->month . "&day=" . $day;
        $formattedDate = $this->year . "-" . $this->month . "-" . $day;

        $html = null;
        if($formattedDate == $this->selectedDate){
            $html .= <<<HTML
<a href=/~rayzacha/Concord/calendar/{$dateHref}"><span class="active">$day</span></a>
HTML;
        } else {
            $html .= <<<HTML
<a href=/~rayzacha/Concord/calendar/{$dateHref}><span>$day</span></a>
HTML;
        }

        //<a href='/~rayzacha/Concord/calendar/params?date={$date}>{++$currentDa}</a>

        return $html;
    }

    public function getCalendarHeader($month, $year){
        $nextMonthRef = null;
        if($this->month == 12){
            $nextMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=1&year=" . ($year + 1);
            $prevMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=11&year=" . $year;
        }elseif($this->month == 1){
            $nextMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=2&year=" . $year;
            $prevMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=12&year=" . ($year - 1);
        }else{
            $nextMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=" . ($month + 1) . "&year=" . $year;
            $prevMonthRef = "/~rayzacha/Concord/calendar/?day=1&month=" . ($month - 1) . "&year=" . $year;
        }
        return <<<HTML
<div class="month-header">
  <ul>
    <li class="prev"><a href={$prevMonthRef}>&#8592;</a></li>
    <li class="next"><a href={$nextMonthRef}>&#8594;</a></li>
    <li>{$this->getMonthName($month,$year)}<br><span>{$year}</span></li>
  </ul>
</div>
HTML;

    }

    /**
     * @param $month
     * @param $year
     * @return int
     */
    public function getNumOfWeeksInMonth($month, $year){
        $wholeWeeks = 4;
        $baseNumDays = 28;

        $numDays =  $this->getNumDaysInMonth($month, $year);
        $firstDayIdx = $this->getFirstDayOfMonthIndex($month, $year);

        $numExtraDaySlots = 7 - $firstDayIdx;
        $numExtraDays = $numDays - $baseNumDays;

        if($numDays == $baseNumDays && $firstDayIdx == 0 ){
            return $wholeWeeks;
        }
        if(($numExtraDays > $numExtraDaySlots) && (($numDays - $numExtraDays) >= $baseNumDays)){
            return $wholeWeeks + 2;
        }
        return $wholeWeeks + 1;
    }

    /**
     * w - 0 Sunday to 6 Saturday
     * @param $month
     * @param $year
     * @return false|string
     */
    public function getFirstDayOfMonthIndex($month, $year) {
        $startDate = $year . "-" . $month . "-" . "1";
        return date('w', strtotime($startDate));
    }

    /**
     * w - 0 Sunday to 6 Saturday
     * @param $month
     * @param $year
     * @return false|string
     */
    public function getLastDayOfMonthIndex($month, $year) {
        $lastDay = $this->getNumDaysInMonth($month, $year);
        $endDate = $year . "-" . $month . "-" . $lastDay;
        return date('w', strtotime($endDate));
    }

    public function getWeekdayName($day, $month, $year){
        $date = $year . "-" . $month . "-" . $day;
        return date('l', strtotime(date($date)));
    }

    public function getMonthName($month, $year){
        $date = $year . "-" . $month . "-" . "1";
        return date('F', strtotime(date($date)));
    }

    /**
     * @param $month
     * @param $year
     * @return int
     */
    public function getNumDaysInMonth($month, $year){
        return cal_days_in_month ( CAL_GREGORIAN , $month , $year );
    }

    public function showTrips(){
        $users = new Users($this->site);
        $trip = new Trips($this->site);
        $trips = $trip->getTripsByMonth($this->month, $this->year);

        if(count($trips) == 0 ){
            $html = <<<HTML
<div>
<p>There are no trips scheduled to start this month</p>
</div>
HTML;
            return $html;
        }

        $html = "";
        foreach ($trips as $event){
            $startDate = $event['startDate'];
            $endDate = $event['endDate'];
            $guests = $event['guests'];
            $user = $users->get($event['userid']);
            $name = $user->getFirstName() . " " . $user->getLastName();

            $html .= <<<HTML
<div>
<p>$name: $startDate to $endDate and bringing $guests </p>
</div>
HTML;
        }

        return $html;
    }

}