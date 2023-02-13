<html>
<?php
include("components/header.php");
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
                    <img style="max-width: 150%; max-height: 150%"
                        src="https://media.istockphoto.com/id/1300972574/photo/millennial-male-team-leader-organize-virtual-workshop-with-employees-online.jpg?b=1&s=170667a&w=0&k=20&c=96pCQon1xF3_onEkkckNg4cC9SCbshMvx0CfKl2ZiYs="
                        alt="" srcset="">

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
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <div class="card" style="width: 16rem; background-color: #fff9db;">
                            <div class="card-body">
                                <h5 class="card-title">Total Invested</h5>
                                <h6 class="card-subtitle mb-2 text-muted">$
                                    <?php echo $user['total_invested'] ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem; background-color: #dbffe1;">
                            <div class="card-body ">
                                <h5 class="card-title">Profit</h5>
                                <h6 class="card-subtitle mb-2 text-muted">$
                                    <?php echo $user['total_profit'] ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem; background-color: #ffdbdb; ">
                            <div class="card-body">
                                <h5 class="card-title">Loss</h5>
                                <h6 class="card-subtitle mb-2 text-muted">$
                                    <?php echo $user['total_lost'] ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 16rem; background-color: #dbffe1;">
                            <div class="card-body">
                                <h5 class="card-title">Net Worth</h5>
                                <h6 class="card-subtitle mb-2 text-muted">$
                                    <?php echo $user['net_worth'] ?>
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-white-bg">
                <div class="row">
                    <div class="col-8">

                        <h5 style="margin-bottom: 1rem; border-left: 10px solid #000000; padding-left: 0.8rem;">
                            Investments <i class="fa-solid fa-plus" style="float: right; cursor: pointer;"></i></h5>
                    </div>
                </div>
                <div class="container-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="card mb-3 invCard">
                                <div class="card-body">
                                    <h5 class="card-title">$TSLA (Tesla) <i class="fa-regular fa-pen-to-square"></i>
                                    </h5>
                                    <p class="card-text"><span>$20,890</span> | Shares: <span>6,769</span> | Date:
                                        <span>February 9, 2023</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3 invCard">
                                <div class="card-body">
                                    <h5 class="card-title">$GOOGL (Google)<i class="fa-regular fa-pen-to-square"></i>
                                    </h5>
                                    <p class="card-text"><span>$20,890</span> | Shares: <span>6,769</span> | Date:
                                        <span>February 9, 2023</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3 invCard">
                                <div class="card-body">
                                    <h5 class="card-title">$GOGL (Alphabet)<i class="fa-regular fa-pen-to-square"></i>
                                    </h5>
                                    <p class="card-text"><span>$20,890</span> | Shares: <span>6,769</span> | Date:
                                        <span>February 9, 2023</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card mb-3 invCard">
                                <div class="card-body">
                                    <h5 class="card-title">$BTC (Bitcoin) <i class="fa-regular fa-pen-to-square"></i>
                                    </h5>
                                    <p class="card-text"><span>$20,890</span> | Shares: <span>6,769</span> | Date:
                                        <span>February 9, 2023</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>

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