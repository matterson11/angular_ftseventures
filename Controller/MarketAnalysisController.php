<?php

include('simple_html_dom.php');
include("Helper.php");
include("BaseController.php");


// Uploading the price target from Yahoo Finance for every company listed in the company table

/*
 * This page uses a page crawler to search through Yahoo Finance Analyst Ratings.  It lists the number of analysts
 * rating strong buy, buy, hold, underperform, sell.
 * Crawling the same page it works out the mean price target and sets a score based on the potential upswing.
 *
 */


class MarketAnalysisController extends BaseController
{

    function ftse100MarketAnalysis()
    {
        $symbols = $this->helper->getAllFtse100Symbols();
        $this->connect();
        foreach ($symbols as $i => $symbol) {
            $symbol = $symbol["symbol"];
            $incorrectSymbol = $this->analysis->ftse100Symbols($symbol);
            if ($incorrectSymbol) {
                continue;
            }
            $url = "https://uk.finance.yahoo.com/q/ao?s=$symbol.L";
            $html = new simple_html_dom();
            $html->load_file($url);
            $tables = $html->find('table');
            $table_1 = $tables[4]->find('table');
            foreach ($table_1[4]->find('tr') as $j => $rows) {

                if ($j == 0) {
                    foreach ($rows->find("td") as $i => $bodies) {
                        if ($i == 1) {
                            $price = $bodies->plaintext;
                            $mean_price = floatval(str_replace(',', '', $price));
                        }
                    }
                }
            }
            $trends_table = $table_1[8]->find('table');
            foreach ($trends_table[0]->find('tr') as $n => $rows) {
                if ($n == 1) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $strong_buy = intval($rating);
                        }
                    }
                }
                if ($n == 2) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $buy = intval($rating);
                        }
                    }
                }
                if ($n == 3) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $hold = intval($rating);
                        }
                    }
                }
                if ($n == 4) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $underperform = intval($rating);
                        }
                    }
                }
                if ($n == 5) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $sell = intval($rating);
                        }
                    }
                }
            }
            $analyst_rating = $this->analysis->analystRating($strong_buy, $buy, $hold, $underperform, $sell);
            $query = $this->mysqli->query("UPDATE ftse100 SET ftse100.strong_buy = '" . $strong_buy . "', ftse100.buy = '" . $buy . "',
                ftse100.hold = '" . $hold . "', ftse100.underperform = '" . $underperform . "', ftse100.sell = '" . $sell . "',
                ftse100.analyst_score = '" . $analyst_rating . "', ftse100.price_target = '" . $mean_price . "', ftse100.updated_at = NOW()
                 WHERE ftse100.symbol = '" . $symbol . "'");

        }
    }

    function ftse250MarketAnalysis()
    {
        
        $symbols = $this->helper->getAllFtse250Symbols();
        $this->connect();
        foreach ($symbols as $i => $symbol) {
            $symbol = $symbol["symbol"];
            $incorrectSymbol = $this->analysis->ftse250Symbols($symbol);
            if ($incorrectSymbol) {
                continue;
            }

            $url = "https://uk.finance.yahoo.com/q/ao?s=$symbol.L";
            $html = new simple_html_dom();
            $html->load_file($url);
            $tables = $html->find('table');

            $table_1 = $tables[4]->find('table');

            foreach ($table_1[4]->find('tr') as $j => $rows) {
                if ($j == 0) {
                    foreach ($rows->find("td") as $i => $bodies) {
                        if ($i == 1) {
                            $price = $bodies->plaintext;
                            $mean_price = floatval(str_replace(',', '', $price));
                        }
                    }
                }
            }
            
            $trends_table = $table_1[8]->find('table');
            foreach ($trends_table[0]->find('tr') as $n => $rows) {
                if ($n == 1) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $strong_buy = intval($rating);
                        }
                    }
                }
                if ($n == 2) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $buy = intval($rating);
                        }
                    }
                }
                if ($n == 3) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $hold = intval($rating);
                        }
                    }
                }
                if ($n == 4) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $underperform = intval($rating);
                        }
                    }
                }
                if ($n == 5) {
                    foreach ($rows->find("td") as $second => $bodies) {
                        if ($second == 1) {
                            $rating = $bodies->plaintext;
                            $sell = intval($rating);
                        }
                    }
                }
            }
            $analyst_rating = $this->analysis->analystRating($strong_buy, $buy, $hold, $underperform, $sell);
            $query = $this->mysqli->query("UPDATE ftse250 SET ftse250.strong_buy = '" . $strong_buy . "', ftse250.buy = '" . $buy . "',
                ftse250.hold = '" . $hold . "', ftse250.underperform = '" . $underperform . "', ftse250.sell = '" . $sell . "',
                ftse250.analyst_score = '" . $analyst_rating . "', ftse250.price_target = '" . $mean_price . "', ftse250.updated_at = NOW()
                 WHERE ftse250.symbol = '" . $symbol . "'");
        }
    }
}
$ftseAnalyst = new MarketAnalysisController();

    $ftseAnalyst->ftse100MarketAnalysis();
    $ftseAnalyst->ftse250MarketAnalysis();

