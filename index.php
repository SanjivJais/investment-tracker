<html>
<?php
include("components/header.php");
// include("fetch_from_api.php");
include("connection.php");

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login.php");
}
include('connection.php');
$row = "SELECT * from users WHERE id = '$user_id'";
$result = $conn->query($row);
$user = $result->fetch_assoc();
//investment data
$invRow = "SELECT * from investments WHERE user_id = '$user_id'";
$invResult = $conn->query($invRow);


//stock data from API fetching from database
$s_Data = "SELECT * from stock_data";
$result1 = $conn->query($s_Data);



?>


<link rel="stylesheet" href="CSS\dash.css">

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box">
                <h1 style="margin-left: 7%;" class="fs-4"><span
                        class="bg-white text-dark rounded shadow px-2 me-2">IT</span> <span
                        class="text-white">ITracker</span></h1>

            </div>

            <div class="p_components">
                <div id="prof_pic">
                    <img style="max-width: 110%; max-height: 110%;" src="IMG\user-profile-icon.jpg" alt="" srcset="">

                </div>
            </div>
            <div class="prof_details" style="text-align: center; font-size: 14px;
                font-weight: 400;">
                <h6>
                    <?php echo $user['name'] ?>
                </h6>
                <p style="font-size: 12px;">
                    <?php echo $user['ph_no'] ?>
                </p>
            </div>
            <hr>

            <ul>
                <li class="list-group-item side_btn" onclick="window.location.href='profile.php'"><span><i
                            class="fa-solid fa-gear"></i></span>Settings
                </li>
                <li class="list-group-item side_btn"
                    onclick="window.location.href='processes/account-process.php?value=logout'"><span><i
                            class="fa-solid fa-right-from-bracket"></i></span>Logout
                </li>

            </ul>
        </div>

        <!-- main body content starts here   -->
        <div class="content">
            <div class="container container-1">
                <div class="row align-items-center justify-content-between overviewRow">
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total Invested</h5>
                                <h6 class="card-subtitle mb-2 text-muted"> <span style="color: #42BE5C;">$
                                        <?php echo $user['total_invested'] ?>
                                    </span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body ">
                                <h5 class="card-title">Profit</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span style="color: #42BE5C;">$
                                        <?php echo $user['total_profit'] ?>
                                    </span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title lossCardTitle" style=" background-color: #ea3943;">Loss</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span style="color: #ea3943;">$
                                        <?php echo $user['total_lost'] ?>
                                    </span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Net Worth</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span style="color: #42BE5C;">$
                                        <?php echo $user['net_worth'] ?>
                                    </span>
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-white-bg">
                <div class="row">
                    <div class="col-6 row-2-col-1">
                        <h5 style="margin-bottom: 1rem; border-left: 10px solid #000000; padding-left: 0.8rem;">
                            My investments <i class="fa-solid fa-plus" style="float: right; cursor: pointer;"
                                data-bs-toggle="modal" data-bs-target="#addInvModal" title="Add new investment"></i>
                        </h5>
                        <div class="investmentList">
                            <div class="investmentListDefault" id="investmentListDefault"
                                style="background-color: white; height: 100%; width: 100%; border-radius: 0.6rem;  display: flex; justify-content: center; align-items: center;">
                                <p style="text-align: center; line-height: 30px; font-size: 1rem;"><i
                                        class="fa-solid fa-piggy-bank"
                                        style="font-size: 3rem; margin-bottom: 1.5rem;"></i> <br> No investments yet!
                                    <br>Add a new
                                    investment by clicking on the + icon.
                                </p>
                            </div>
                            <?php
                            if (mysqli_num_rows($invResult) >= 1) {
                                echo '<style>#investmentListDefault { display: none !important; }</style>';
                                while ($investmentDetails = $invResult->fetch_assoc()) { ?>
                                    <div class="card mb-3 invCard">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo $investmentDetails['inv_name'] ?><i
                                                    class="fa-solid fa-angles-right"></i> <i
                                                    class="fa-solid fa-hand-holding-dollar" title="Update transaction"
                                                    data-bs-toggle="modal" data-bs-target="#updateTransaction"></i>
                                            </h5>
                                            <p class="card-text"><span>$
                                                    <?php echo $investmentDetails['inv_amt'] ?>
                                                </span> | Shares: <span>
                                                    <?php echo $investmentDetails['share_no'] ?>
                                                </span> | Date:
                                                <span>
                                                    <?php echo $investmentDetails['inv_date'] ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                <?php }
                            } ?>

                        </div>
                    </div>

                    <!-- section for real-time stock prices  -->

                    <div class="col-6 row-2-col-2">
                        <h5 style="margin-bottom: 1rem; border-left: 10px solid #000000; padding-left: 0.8rem;">
                            Stock prices
                        </h5>
                        <div class="liveStockPrice">
                            <?php while ($stockData = $result1->fetch_assoc()) { ?>
                                <div class="card mb-3 stockPriceCard">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $stockData['symbol'] ?>
                                        </h5>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>


        </div>
    </div>


    <!-- Modals used in this page  -->

    <!-- Add investment modal -->
    <div class="modal fade" id="addInvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add investment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="processes\invTransaction.php?id=<?php echo $user['id'] ?>&actionType=addNewInvestment"
                        method="post" id="addInvestment">
                        <div class="mb-3">
                            <label for="invName" class="form-label">Investment name</label>
                            <input type="text" class="form-control" id="invName" name="invName"
                                placeholder="e.g. $NFLX (Netflix)" required>
                        </div>
                        <div class="mb-3">
                            <label for="shareNumber" class="form-label">No of shares</label>
                            <input type="number" class="form-control" id="shareNumber" name="shareNumber"
                                placeholder="e.g. 100" required>
                        </div>
                        <div class="mb-3">
                            <label for="pricePerShare" class="form-label">Price per share ($)</label>
                            <input type="number" step="0.01" class="form-control" id="pricePerShare"
                                name="pricePerShare" placeholder="e.g. 80" required>
                        </div>
                        <div class="mb-3">
                            <label for="invDate" class="form-label">Date of investment</label>
                            <input type="date" class="form-control" id="invDate" name="invDate"
                                placeholder="e.g. 02/23/2023" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" form="addInvestment">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update transaction modal -->
    <div class="modal fade" id="updateTransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update transaction</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form
                        action="processes\invTransaction.php?id=<?php echo $user['id'] ?>&actionType=updateTransaction"
                        method="post" id="updateTransaction">
                        <div class="mb-3">
                            <label for="transType" class="form-label">Select type of transaction</label>
                            <select name="transType" id="transType"
                                style="margin-left: 0.3rem; border: 1px solid rgb(0, 0, 0); outline: none; padding: 0 0.3rem; border-radius: 0.2rem;">
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="shareNumberTrans" class="form-label">No of shares</label>
                            <input type="number" class="form-control" id="shareNumberTrans" name="shareNumberTrans"
                                placeholder="e.g. 50" required>
                        </div>
                        <div class="mb-3">
                            <label for="pricePerShareTrans" class="form-label">Price per share ($)</label>
                            <input type="number" step="0.01" class="form-control" id="pricePerShareTrans"
                                name="pricePerShareTrans" placeholder="e.g. 120" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" form="updateTransaction">Update</button>
                </div>
            </div>
        </div>
    </div>











</body>
<script src="JS\dash.js"></script>
<?php
include("components/footer.php");
?>

</html>