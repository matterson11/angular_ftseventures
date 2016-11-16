<?php
date_default_timezone_set('Europe/London');

include("MarketAnalysisClass.php");
include("DirectorRatingsClass.php");


class Helper
{
    private $mysqli;

    public function __construct()
    {
        // Connect to our database and store in $mysqli property
        $this->connect();
    }

    private function connect()
    {
        $this->mysqli = new mysqli( 'localhost', 'root', 'password', 'database_name' );

    }
    public function getFtse100Symbols()
    { // need to sort out db config

        $current_time = date("Y-m-d H:i:s");
        $first_time = date("Y-m-d 22:30:00");
        $second_time = date("Y-m-d 04:30:00");
        $third_time = date("Y-m-d 07:30:00");

        if (($current_time > $first_time) && ($current_time <= $second_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse100 where id < 50");
        }
        if (($current_time > $second_time) && ($current_time <= $third_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse100 where id >= 50");
        }

        //$query = $this->mysqli->query("SELECT symbol from ftse100");
        if (!$query->num_rows) {
            return false;
        }
        $symbols = array();
        while ($row = $query->fetch_array()) {
            $symbols[] = $row;
        }
        return $symbols;
    }

    public function getFtse250Symbols()
    { // need to sort out db config
        $current_time = date("Y-m-d H:i:s");
        $first_time = date("Y-m-d 07:30:00");
        $second_time = date("Y-m-d 10:30:00");
        $third_time = date("Y-m-d 13:30:00");
        $fourth_time = date("Y-m-d 16:30:00");
        $fifth_time = date("Y-m-d 19:30:00");
        $sixth_time = date("Y-m-d 22:30:00");

        if (($current_time > $first_time) && ($current_time <= $second_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse250 where id < 50");
        }
        if (($current_time > $second_time) && ($current_time <= $third_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse250 where id >= 50 and id < 100");
        }
        if (($current_time > $third_time) && ($current_time <= $fourth_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse250 where id >= 100 and id < 150");
        }
        if (($current_time > $fourth_time) && ($current_time <= $fifth_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse250 where id >= 150 and id < 200");
        }
        if (($current_time > $fifth_time) && ($current_time <= $sixth_time)) {
            $query = $this->mysqli->query("SELECT symbol from ftse250 where id >= 200");
        }

        //$query = $this->mysqli->query("SELECT symbol from ftse250");
        if (!$query->num_rows) {
            return false;
        }
        $symbols = array();
        while ($row = $query->fetch_array()) {
            $symbols[] = $row;
        }
        return $symbols;
    }

    public function getAllFtse100Symbols()
    { // need to sort out db config
        $query = $this->mysqli->query("SELECT symbol from ftse100");

        if (!$query->num_rows) {
            return false;
        }
        $symbols = array();
        while ($row = $query->fetch_array()) {
            $symbols[] = $row;
        }
        return $symbols;
    }

    public function getAllFtse250Symbols()
    { // need to sort out db config

        $query = $this->mysqli->query("SELECT symbol from ftse250");
        if (!$query->num_rows) {
            return false;
        }
        $symbols = array();
        while ($row = $query->fetch_array()) {
            $symbols[] = $row;
        }
        return $symbols;
    }

    public function getCompanyDealingSymbol()
    { // need to sort out db config
        $query = $this->mysqli->query("SELECT symbol from dealings_company");
        if (!$query->num_rows) {
            return false;
        }
        $symbols = array();
        while ($row = $query->fetch_array()) {
            $symbols[] = $row;
        }
        return $symbols;
    }
}
