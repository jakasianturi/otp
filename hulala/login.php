<?php

if ($user_id) {
    header("location: " . BASE_URL . "/index.php?page=home");
}

?>

<div class="main">

    <!-- Login Area -->

    <div class="login-container">

        <div class="login-form" id="loginForm" style="display: flex; flex-direction: column; align-items: center;">
            <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="Logo" height="100">
            <h2 class="text-center">Log In Your Account</h2>
            <p class="text-center">Welcome! Please Enter Your Details.</p>
            <form action="<?php echo BASE_URL; ?>/login-proses.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <input hidden type="text" name="status"></input>
                </div>
                <button type="submit" class="btn btn-secondary login-btn form-control">Login</button>
                <br />
                <p id="register">No Account? Register <span style="color:black;" class="switch-form-link-register" onclick="showRegistrationForm()">Here.</span></p>
                <p>Membuka Hasil ujian <a href="<?php echo BASE_URL; ?>?page=dekripsi" style="color:black;">Here.</a></p>

            </form>
        </div>

    </div>

    <!-- Registration Area -->
    <div class="registration-form" id="registrationForm">
        <h2 class="text-center">Registration Form</h2>
        <p class="text-center">Fill in you personal details.</p>
        <form action="./endpoint/add-user.php" method="POST">
            <div class="form-group registration row">
                <div class="col-6">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="first_name">
                </div>
                <div class="col-6">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="last_name">
                </div>
            </div>
            <div class="form-group registration row">
                <div class="col-5">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="number" class="form-control" id="contactNumber" name="contact_number" maxlength="11">
                </div>
                <div class="col-7">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group registration">
                <label for="registerUsername">Username:</label>
                <input type="text" class="form-control" id="registerUsername" name="username">
            </div>
            <div class="form-group registration">
                <label for="registerPassword">Password:</label>
                <input type="password" class="form-control" id="registerPassword" name="password">
            </div>
            <input hidden type="text" class="form-control" name="key" id="" placeholder="Key" value="tes"><br>

            <p>Already have an account? Login <span style="color:black;" class="switch-form-link" onclick="showLoginForm()">Here.</span></p>
            <button type="submit" class="btn btn-dark login-register form-control" name="register">Register</button>
            <!-- <input type="text" name="status">  -->
        </form>

    </div>

</div>

<script>
    const loginForm = document.getElementById('loginForm');
    const registrationForm = document.getElementById('registrationForm');

    registrationForm.style.display = "none";


    function showRegistrationForm() {
        registrationForm.style.display = "";
        loginForm.style.display = "none";
    }

    function showLoginForm() {
        registrationForm.style.display = "none";
        loginForm.style.display = "flex";
    }

    function sendVerificationCode() {
        const registrationElements = document.querySelectorAll('.registration');

        registrationElements.forEach(element => {
            element.style.display = 'none';
        });

        const verification = document.querySelector('.verification');
        if (verification) {
            verification.style.display = 'none';
        }
    }
</script>