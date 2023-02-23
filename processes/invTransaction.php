<?php
include('..\connection.php');

$id = $_GET['id'];
$actionType = $_GET['actionType'];

if ($actionType == "addNewInvestment") {
    $invName = $_POST['invName'];
    $shareNumber = $_POST['shareNumber'];
    $pricePerShare = $_POST['pricePerShare'];
    $invDate = $_POST['invDate'];
    $invAmount = $shareNumber * $pricePerShare;

    $query = "INSERT into investments (inv_name, share_no, price_per_share, inv_amt, inv_date, user_id) VALUES ('$invName','$shareNumber','$pricePerShare','$invAmount','$invDate','$id ')";
    $portfolioQuery = "UPDATE users SET total_invested= total_invested + $invAmount, net_worth= net_worth +$invAmount WHERE id='$id'";
} 
// elseif ($actionType == "updateTransaction") {
//     $transType = $_POST['transType'];
//     $shareNumberTrans = $_POST['shareNumberTrans'];
//     $pricePerShareTrans = $_POST['pricePerShareTrans'];
//     $transAmount = $shareNumberTrans * $pricePerShareTrans;
//     if ($transType == "buy") {
//         $query = "UPDATE investments SET share_no = share_no +$shareNumberTrans, inv_amt = inv_amt+$transAmount WHERE user_id='$id'";
//         $portfolioQuery = "UPDATE users SET total_invested= total_invested + $transAmount, net_worth= net_worth +$transAmount WHERE id='$id'";
//         // $newTransQuery = "INSERT INTO transactions (trans_type, inv_name, trans_share_no, price_per_share, trans_amt, trans_date, user_id) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";


//     } elseif ($transType == "sell") {

//     }

// }
if (mysqli_query($conn, $query) && mysqli_query($conn, $portfolioQuery)) {

    header('Location: ..\index.php');
} else {
    // echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    echo "ERROR: Could not able to execute" . mysqli_error($conn);
}


?>