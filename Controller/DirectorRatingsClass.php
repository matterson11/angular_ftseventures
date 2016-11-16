<?php

/*
 * Holds the functions for DirectorRatingsController
 */

class DirectorRatingsClass {

    public function directorTradeRating($total_buy_trades, $total_sell_trades)
    {
        $sum_amount_of_orders = $total_sell_trades - $total_buy_trades;
        if ($sum_amount_of_orders == 0) {
            $director_trade_rating = 5;
        }
        if ($sum_amount_of_orders !== 0) {
            if ($sum_amount_of_orders > 0) {
                if ($sum_amount_of_orders > 0 && $sum_amount_of_orders <= 5) {
                    $director_trade_rating = 6;
                }
                if ($sum_amount_of_orders > 5 && $sum_amount_of_orders <= 10) {
                    $director_trade_rating = 7;
                }
                if ($sum_amount_of_orders > 10) {
                    $director_trade_rating = 8;
                }

            }
            if ($sum_amount_of_orders < 0) {
                if ($sum_amount_of_orders < 0 && $sum_amount_of_orders >= -5) {
                    $director_trade_rating = 4;
                }
                if ($sum_amount_of_orders < -5 && $sum_amount_of_orders >= -10) {
                    $director_trade_rating = 3;
                }
                if ($sum_amount_of_orders < -10 && $sum_amount_of_orders >= -15) {
                    $director_trade_rating = 2;
                }
                if ($sum_amount_of_orders < -15) {
                    $director_trade_rating = 1;
                }
            }
        }
        return $director_trade_rating;
    }

    public function finalTradeType($total_buy_trades, $total_sell_trades)
    {
        $sum_amount_of_orders = $total_sell_trades - $total_buy_trades;
        if ($sum_amount_of_orders == 0) {
            $final_trade_type = "Hold";
        }
        if ($sum_amount_of_orders !== 0) {
            if ($sum_amount_of_orders > 0) {
                $final_trade_type = "Buy";
            }
            if ($sum_amount_of_orders < 0) {
                $final_trade_type = "Sell";
            }
        }
        return $final_trade_type;
    }

    public function tradeValueRating($buy_value, $sell_value)
    {
        $sum_value_of_deals = $buy_value - $sell_value;
        if ($sum_value_of_deals == 0) {
            $trade_value_rating = 5;
        }
        if ($sum_value_of_deals !== 0) {
            if ($sum_value_of_deals > 0) {
                if ($sum_value_of_deals > 0 && $sum_value_of_deals <= 100000) {
                    $trade_value_rating = 6;
                }
                if ($sum_value_of_deals > 100000) {
                    $trade_value_rating = 7;
                }
            }
            if ($sum_value_of_deals < 0) {
                if ($sum_value_of_deals < 0 && $sum_value_of_deals >= -50000) {
                    $trade_value_rating = 4;
                }
                if ($sum_value_of_deals < -50000 && $sum_value_of_deals >= -250000) {
                    $trade_value_rating = 3;
                }
                if ($sum_value_of_deals < -250000 && $sum_value_of_deals >= -500000) {
                    $trade_value_rating = 2;
                }
                if ($sum_value_of_deals < -500000) {
                    $trade_value_rating = 1;
                }
            }

        }
        return $trade_value_rating;
    }

    public function sumTradeType($buy_value, $sell_value){
        $sum_value_of_deals = $buy_value - $sell_value;
        if ($sum_value_of_deals == 0) {
            $sum_trade_type = "Hold";
        }
        if ($sum_value_of_deals !== 0) {
            if ($sum_value_of_deals > 0) {
                $sum_trade_type = "Buy";
            }
            if ($sum_value_of_deals < 0) {
                $sum_trade_type = "Sell";
            }

        }
        return $sum_trade_type;
    }

}