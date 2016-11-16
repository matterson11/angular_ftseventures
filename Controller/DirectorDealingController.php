<?php
include('simple_html_dom.php');
include("BaseController.php");
include("Helper.php");


/*
 * This is used to update the dealings table that records every large buy and sell order being made by Directors
 */

class DirectorDealingController extends BaseController
{
    function directorDealing()
    {
        $url = "http://investing.thisismoney.co.uk/director-dealings/";
        $html = new simple_html_dom();
        $html->load_file($url);
        $tables = $html->find('table');
        $this->connect();
        foreach ($tables[0]->find("tr") as $rows) // gets the data for all rows inside the first table
        {
            foreach ($rows->find("td") as $h => $bodies) {
                if ($h == 0) {
                    $temp_date = $bodies->plaintext;
                    $date = date("Y-m-d", strtotime($temp_date));
                }
                if ($h == 1) {
                    $name = $bodies->plaintext;
                }
                if ($h == 2) {
                    $temp_symbol = $bodies->plaintext;
                    $symbol = preg_replace('/\./', '', $temp_symbol);
                }
                if ($h == 4) {
                    $temp_volume = $bodies->plaintext;
                    list($one, $two) = explode(" @ ", $temp_volume, 2);
                    $volume = intval(str_replace(',', '', $one));
                    $price = floatval(str_replace(',', '', $two));
                }
                if ($h == 5) {
                    $temp_value = $bodies->plaintext;
                    $part_value = str_replace('&pound;', '', $temp_value);
                    $value = floatval(str_replace(',', '', $part_value));
}
                    $query = $this->mysqli->query("select date, company_name, company_symbol, volume, price from dealings where date = '" . $date . "'
    and company_name = '" . $name . "' and volume = '" . $volume . "' and price = '" . $price . "' ");

                    if ($query->num_rows == 0) {
                        $buy = "Buy";
                        $query = $this->mysqli->query("insert into dealings(date, company_name, company_symbol, type,  volume, price, trade_value)
values ('".$date."', '".$name."', '".$symbol."', '".$buy."', '".$volume."', '".$price."', '".$value."')");
                      
                    }

                    $query = $this->mysqli->query("INSERT INTO dealings_company (name, symbol)
SELECT dealings.company_name, dealings.company_symbol from dealings
where not EXISTs (select name from dealings_company where dealings_company.name = dealings.company_name)");

                    $query = $this->mysqli->query("UPDATE dealings, dealings_company SET dealings.company_id=dealings_company.id
WHERE dealings.company_name=dealings_company.name");

            }

        }

        foreach ($tables[1]->find("tr") as $rows) {
            foreach ($rows->find("td") as $j => $bodies) {
                if ($j == 0) {
                    $temp_date = $bodies->plaintext;
                }
                if ($j == 1) {
                    $name = $bodies->plaintext;
                }
                if ($j == 2) {
                    $temp_symbol = $bodies->plaintext;
                    $symbol = preg_replace('/\./', '', $temp_symbol);
                }
                if ($j == 4) {
                    $temp_volume = $bodies->plaintext;
                    list($one, $two) = explode(" @ ", $temp_volume, 2);
                    $volume = intval(str_replace(',', '', $one));
                    $price = floatval(str_replace(',', '', $two));
                }
                if ($j == 5) {
                    $temp_value = $bodies->plaintext;
                    $part_value = str_replace('&pound;', '', $temp_value);
                    $value = floatval(str_replace(',', '', $part_value));
                }
                    $query = $this->mysqli->query("select date, company_name, company_symbol, volume, price from dealings where date = '" . $date . "'
                            and company_name = '" . $name . "' and volume = '" . $volume . "' and price = '" . $price . "' ");

                    if ($query->num_rows == 0) {
                        $sell = "Sell";

                        $query = $this->mysqli->query("insert into dealings(date, company_name, company_symbol, type,  volume, price, trade_value)
values ('".$date."', '".$name."', '".$symbol."', '".$sell."', '".$volume."', '".$price."', '".$value."')");
                    }
                    $query = $this->mysqli->query("INSERT INTO dealings_company (name, symbol)
             SELECT dealings.company_name, dealings.company_symbol from dealings
             where not EXISTs (select name from dealings_company where dealings_company.name = dealings.company_name)");
                    $query = $this->mysqli->query("UPDATE dealings, dealings_company SET dealings.company_id=dealings_company.id
            WHERE dealings.company_name=dealings_company.name");
                

            }

        }

    }
}

$directorDealing = new DirectorDealingController();
$directorDealing->directorDealing();

?>