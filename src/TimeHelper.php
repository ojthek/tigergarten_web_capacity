<?php

class TimeHelper {

    private $date;
    private $weekInterval;

    public function __construct($date = 'now')
    {
        if ($date == 'now' || !($date instanceof DateTime)) {
            $date = new DateTime();
        }

        $this->date = $date->modify("Monday this week");
        $this->weekInterval = new DateInterval('P7D');
    }

    public function weekBefore() {
        $d = clone $this->date;
        return $d->sub($this->weekInterval);
    }

    public function weekAfter() {
        $d = clone $this->date;
        return $d->add($this->weekInterval);
    }

    public function getDate() {
        return clone $this->date;
    }
}


// $d1 = new DateTime("2021-01-04");
// $d2 = new DateTime();

// $di = new DateInterval('P7D');

// print_r($d1);
// print_r($d2);
// print_r($d2->diff($d1));
// print_r($di);
// print_r($d1->add($di));
// print_r($d1->sub($di));
// print_r($d1->modify("Monday this week"));



?>