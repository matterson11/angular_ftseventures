 <?php
include('simple_html_dom.php');
include('database.php');

$page = [];

$url = "https://uk.finance.yahoo.com/q?s=^ftse";

$html = new simple_html_dom();
$html->load_file($url);
$start = $html->find("span[id=yfs_l10_^ftse]", 0);
$page["ftse100_price"] = $start->plaintext;
// $ftse100_price
$movement = $html->find("span[id=yfs_c10_^ftse]", 0);
$page["ftse100_move"] = $movement->plaintext;
// ftse100_move
$change = $html->find("span[id=yfs_p20_^ftse]", 0);
$page["ftse100_percent_change"] = $change->plaintext;
// $ftse100_percent_change
$prevClose = $html->find("td[class=yfnc_tabledata1]", 0);
$page["ftse100_previous_close"] = $prevClose->plaintext;
// ftse100_previous_close

$url = "https://uk.finance.yahoo.com/q?s=^ftmc";
$html = new simple_html_dom();
$html->load_file($url);
$start = $html->find("span[id=yfs_l10_^ftmc]", 0);
$page["ftse250_price"] = $start->plaintext;
// $ftse100_price
$movement = $html->find("span[id=yfs_c10_^ftmc]", 0);
$page["ftse250_move"] = $movement->plaintext;
// ftse100_move
$change = $html->find("span[id=yfs_p20_^ftmc]", 0);
$page["ftse250_percent_change"] = $change->plaintext;
// $ftse100_percent_change
$prevClose = $html->find("td[class=yfnc_tabledata1]", 0);
$page["ftse250_previous_close"] = $prevClose->plaintext;

//echo json_encode($page);

$page["ftse100table"] = [];

$ftse100url = "https://uk.finance.yahoo.com/q?s=^ftse";
$ftse100html = new simple_html_dom();
$html->load_file($ftse100url);

$tables = $html->find('table');
foreach ($tables[3]->find('tr') as $j => $rows) {
    foreach ($rows->find("td") as $i => $bodies) {
        if ($i == 0) {
            $symbol = $bodies->plaintext;
            $symbol = str_replace('.L', '', $symbol);
            try {
                $sql = "SELECT name FROM ftse100 where symbol = '" . $symbol . "'";
                $result = $dbconfig->query($sql);

                $row = $result->fetch_assoc();
                $company_name = $row["name"];
            } catch (Exception $ex) {
                $company_name = "N/A";
            }
            $page['ftse100table'][$j]['company_name'] = $company_name;
            $page['ftse100table'][$j]['symbol'] = $symbol;
        }
        if ($i == 1) {
            $price = $bodies->plaintext;
            $page['ftse100table'][$j]['price'] = $price;
        }
        if ($i == 2) {
            $percent = $bodies->plaintext;
            $page['ftse100table'][$j]['percent'] = $percent;
        }
    }
}

$page["ftse250table"] = [];

$ftse250url = "https://uk.finance.yahoo.com/q?s=^ftmc";
$ftse250html = new simple_html_dom();
$html->load_file($ftse250url);

$tables = $html->find('table');
foreach ($tables[3]->find('tr') as $j => $rows) {
    foreach ($rows->find("td") as $i => $bodies) {
        if ($i == 0) {
            $symbol = $bodies->plaintext;
            $symbol = str_replace('.L', '', $symbol);
            try {
                $sql = "SELECT name FROM ftse250 where symbol = '" . $symbol . "'";
                $result = $dbconfig->query($sql);

                $row = $result->fetch_assoc();
                $company_name = $row["name"];
            } catch (Exception $ex) {
                $company_name = "N/A";
            }
			$page['ftse250table'][$j]['company_name'] = $company_name;

			$page['ftse250table'][$j]['symbol'] = $symbol;
        }
        if ($i == 1) {
            $price = $bodies->plaintext;
            $page['ftse250table'][$j]['price'] = $price;
        }
        if ($i == 2) {
            $percent = $bodies->plaintext;
            $page['ftse250table'][$j]['percent'] = $percent;
        }
    }
}

$page["topftse100"] = [];

$sql = "SELECT name, symbol, final_rating FROM ftse100 order by final_rating desc limit 10";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $symbol = $row["symbol"];
        $score = $row["final_rating"];
        $page['topftse100'][$key]['name'] = $name;
        $page['topftse100'][$key]['symbol'] = $symbol;
        $page['topftse100'][$key]['final_rating'] = $score;
        $key++;
	}
}

$page["topftse250"] = [];

$sql = "SELECT name, symbol, final_rating FROM ftse250 order by final_rating desc limit 10";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $symbol = $row["symbol"];
        $score = $row["final_rating"];
        $page['topftse250'][$key]['name'] = $name;
        $page['topftse250'][$key]['symbol'] = $symbol;
        $page['topftse250'][$key]['final_rating'] = $score;
        $key++;
	}
}

$page["sellftse100"] = [];

$sql = "SELECT name, symbol, final_rating FROM ftse100 where final_rating > 0 order by final_rating asc limit 10";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $symbol = $row["symbol"];
        $score = $row["final_rating"];
        $page['sellftse100'][$key]['name'] = $name;
        $page['sellftse100'][$key]['symbol'] = $symbol;
        $page['sellftse100'][$key]['final_rating'] = $score;
        $key++;
	}
}

$page["sellftse250"] = [];

$sql = "SELECT name, symbol, final_rating FROM ftse250 where final_rating > 0 order by final_rating asc limit 10";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $symbol = $row["symbol"];
        $score = $row["final_rating"];
        $page['sellftse250'][$key]['name'] = $name;
        $page['sellftse250'][$key]['symbol'] = $symbol;
        $page['sellftse250'][$key]['final_rating'] = $score;
        $key++;
	}
}

echo json_encode($page);