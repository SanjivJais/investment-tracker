<html>
<?php
include('components\header.php');
?>
<link rel="stylesheet" href="CSS\signup-login.css">

<div class="container">
    <h1 style="text-align: center; position: relative; top: 5.5vh;" class="fs-4"><span
            class="bg-white text-dark rounded shadow px-2 me-2">IT</span> <span class="text-white">ITracker</span></h1>
    <form action="processes\account-process.php?value=signup" method="post">
        <div class="row align-items-center justify-content-between">
            <div class="signup-box">
                <i class="fa-solid fa-user-plus"></i>
                <h4 style="margin-bottom: 2.6rem;">SIGNUP</h4>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="e.g Sanjiv Jaiswal"
                        name="name" required>
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="email" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Create password"
                        name="pass1" required>
                    <label for="floatingPassword">Create password</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm password"
                        name="pass2" required>
                    <label for="floatingPassword">Confirm password</label>
                </div> -->
                <button type="submit" class="btn btn-dark">CREATE ACCOUNT</button><br>

                <a href="login.php" style="text-decoration: none; font-size: 13px; color: #282828;">I have an
                    account</a>
            </div>
        </div>
    </form>
</div>




<?php
include('components\footer.php');
?>



</html>