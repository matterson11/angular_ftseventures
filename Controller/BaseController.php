<?php

date_default_timezone_set('Europe/London');

class BaseController
{
    protected $mysqli;

    public function __construct() {
        $this->helper = new Helper;
        $this->analysis = new MarketAnalysisClass;
        $this->directorRatings = new DirectorRatingsClass;
    }

    protected function connect() {
        $this->mysqli = new mysqli('localhost', 'root', 'password', 'database_name');

    }

}