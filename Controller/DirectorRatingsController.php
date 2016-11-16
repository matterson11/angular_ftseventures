<?php
include("Helper.php");
include("BaseController.php");

/*
 * Sets the Director Trade Rating - the amount of times a director buys or sells
 * Sets the Trade Value Rating based on the value of total trades made in the past 30 days
 */

class DirectorDealRatingController extends BaseController
{

    function directorRating()
    {
        try {
            $symbols = $this->helper->getCompanyDealingSymbol();
            $this->connect();
            foreach ($symbols as $i => $symbol) {
                $updates = [];
                $symbol = $symbol["symbol"];
                $updates["symbol"] = $symbol;
                $endDate = date("Y-m-d");
//$startDate = date('Y-m-d', strtotime($endDate. ' - 30 days')); // This won't work until we have over 30 days records in the database
                $startDate = date("2016-05-16");
// How many Buys?
                $query = $this->mysqli->query("SELECT count(type) from dealings where date between '" . $startDate . "' and '" . $endDate . "' and type = 'Buy'
and company_symbol = '" . $symbol . "'");
                $row = $query->fetch_array();
                $total_buy_trades = $row['count(type)'];
// Select the trade value for each symbol
                $query = $this->mysqli->query("SELECT trade_value from dealings where date between '" . $startDate . "' and '" . $endDate . "' and type = 'Buy'
and company_symbol = '" . $symbol . "'");
                $trades = array();
                while ($row = $query->fetch_array()) {
                    $trades[] = $row;
                }
                $buy_value = 0;
                foreach ($trades as $trade) {
                    $buy_value += $trade['trade_value'];
                }
// How many Sells?
                $query = $this->mysqli->query("SELECT count(type) from dealings where date between '" . $startDate . "' and '" . $endDate . "' and type = 'Sell'
    and company_symbol = '" . $symbol . "'");
                $row = $query->fetch_array();
                $total_sell_trades = $row['count(type)'];
// Select the trade value of each sell deal
                $query = $this->mysqli->query("SELECT trade_value from dealings where date between '" . $startDate . "' and '" . $endDate . "' and type = 'Sell'
and company_symbol = '" . $symbol . "'");
                $trades = array();
                while ($row = $query->fetch_array()) {
                    $trades[] = $row;
                }
                $sell_value = 0;
                foreach ($trades as $trade) {
                    $sell_value += $trade['trade_value'];
                }
// Did the directors make more trades buying or selling?

                $director_trade_rating = $this->directorRatings->directorTradeRating($total_sell_trades, $total_buy_trades);

                $final_trade_type = $this->directorRatings->finalTradeType($total_sell_trades, $total_buy_trades);

// Input the Director trade rating into dealings_company table
                $query = $this->mysqli->query("UPDATE dealings_company SET dealings_company.director_trade_rating = '" . $director_trade_rating . "'
    WHERE dealings_company.symbol = '" . $symbol . "'");
// access variables in updates array
                $updates["director_trade_rating"] = $director_trade_rating;
                $updates["final_trade_type"] = $final_trade_type;
// Calculate over 30 days whether Directors brought or sold more shares

                $trade_value_rating = $this->directorRatings->tradeValueRating($buy_value, $sell_value);

                $sum_trade_type = $this->directorRatings->sumTradeType($buy_value, $sell_value);

// input data into table
                $query = $this->mysqli->query("UPDATE dealings_company SET dealings_company.trade_value_rating = '" . $trade_value_rating . "'
        WHERE dealings_company.symbol = '" . $symbol . "'");
// access variables via updates array
                $updates["trade_value_rating"] = $trade_value_rating;
                $updates["sum_trade_type"] = $sum_trade_type; // provides a Buy or Sell rating based on trade value of deals

            }
            $query = $this->mysqli->query("UPDATE ftse100, dealings_company SET ftse100.trade_value_rating=dealings_company.trade_value_rating,
    ftse100.director_trade_rating=dealings_company.director_trade_rating, ftse100.updated_at = NOW()
WHERE dealings_company.symbol=ftse100.symbol");

            $query = $this->mysqli->query("UPDATE ftse250, dealings_company SET ftse250.trade_value_rating=dealings_company.trade_value_rating,
    ftse250.director_trade_rating=dealings_company.director_trade_rating, ftse250.updated_at = NOW()
WHERE dealings_company.symbol=ftse250.symbol");
        } catch
        (Exception $ex) {
            return false;
        }
    }
}
$directorRatings = new DirectorDealRatingController();
$directorRatings->directorRating();






