<?php
include("connection.php");
// Replace YOUR_ACCESS_KEY with your actual API access key
$access_key = '1928f42be4fdeba292c62325da886d0e';


// Construct the API URL with your access key
$url = "http://api.marketstack.com/v1/tickers?access_key={$access_key}";

// Fetch data from the API URL
$data = file_get_contents($url);

// Convert JSON data to an array
$data_array = json_decode($data, true);

// Access the 'data' key of the array, which contains the list of tickers
$all_data = $data_array['data'];

$close = 0.00;

// Insert data for each ticker into database
foreach ($all_data as $ticker_data) {
    $symbol = $ticker_data['symbol'];

    $sql = "INSERT INTO stock_data (symbol, close_price) VALUES ('$symbol','$close')";
    mysqli_query($conn, $sql);
}



?>