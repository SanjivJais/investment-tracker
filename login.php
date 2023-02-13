<html>
<?php
include('components\header.php');
?>
<link rel="stylesheet" href="CSS\signup-login.css">

<div class="container">
    <h1 style="text-align: center; position: relative; top: 10vh;" class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">IT</span> <span
            class="text-white">ITracker</span></h1>
    <form action="processes\account-process.php?value=login" method="post">
        <div class="row align-items-center justify-content-between">
            <div class="signup-box">
                <i class="fa-solid fa-user"></i>
                <h4 style="margin-bottom: 2.6rem;">LOGIN</h4>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Enter password" name="pass" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-dark">LOGIN</button><br>

                <a href="signup.php" style="text-decoration: none; font-size: 13px; color: #282828;">I don't have an
                    account</a>
            </div>
        </div>
    </form>
</div>




<?php
include('components\footer.php');
?>



</html>