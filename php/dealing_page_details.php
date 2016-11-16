 <?php
include('simple_html_dom.php');
include('database.php');

$page = [];

$page['buy'] = [];
$sql = "SELECT date, company_name, company_symbol, volume, price, trade_value
FROM dealings where type = 'Buy' order by date desc limit 50";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $date = $row["date"];
        $name = $row["company_name"];
        $symbol = $row["company_symbol"];
        $volume = $row["volume"];
        $price = $row["price"];
        $value = $row["trade_value"];
		$page['buy'][$key]['date'] = $date;
	    $page['buy'][$key]['name'] = $name;
	    $page['buy'][$key]['symbol'] = $symbol;
	    $page['buy'][$key]['volume'] = $volume;
	    $page['buy'][$key]['price'] = $price;
	    $page['buy'][$key]['value'] = $value;
	    $key++;
	}
}

$page['sell'] = [];
$sql = "SELECT date, company_name, company_symbol, volume, price, trade_value
FROM dealings where type = 'Sell' order by date desc limit 50";
$result = $dbconfig->query($sql);

$key = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $date = $row["date"];
        $name = $row["company_name"];
        $symbol = $row["company_symbol"];
        $volume = $row["volume"];
        $price = $row["price"];
        $value = $row["trade_value"];
		$page['sell'][$key]['date'] = $date;
	    $page['sell'][$key]['name'] = $name;
	    $page['sell'][$key]['symbol'] = $symbol;
	    $page['sell'][$key]['volume'] = $volume;
	    $page['sell'][$key]['price'] = $price;
	    $page['sell'][$key]['value'] = $value;
	    $key++;
	}
}



echo json_encode($page);