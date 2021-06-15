<?php
    $pageTitle = "Login";
    include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-header.php';
?>
<!-- Login Form Start -->
    <div class="row justify-content-cetner wrapper" id="login-box">
        <div class="col-lg-12 my-auto">
            <div class="card-group myShadow">
                <div class="card rounded-left p-4" style="flex-grow: 1.4">
                    <h1 class="text-center font-weight-bold text-primary">Signin to Account</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" id="loginForm">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-Mail..." value="<?=$_COOKIE['email'] ?? '';?>" required>                                
                        </div>
                        <!-- Email Field -->

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password..." value="<?=$_COOKIE['password'] ?? '';?>" required>                                
                        </div>
                        <!-- Password Field -->

                        <div class="form-group">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" name="remember" id="remember" <?=isset($_COOKIE['email']) ? 'checked' : '';?> class="custom-control-input">
                                <label for="remember" class="custom-control-label">Remember Me</label>
                            </div>
                            
                            <div class="float-right forgot">
                                <a href="forget-password.php" id="forgot-password">Forget Password</a>
                            </div>
                            <!-- Forget Password -->
                            <div class="clearfix"></div>
                        </div>
                        
                        <!-- Remember Me Field -->

                        <div class="form-group">
                            <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                <!-- Login Card -->
                
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">
                        Welcome Back
                    </h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">
                        Enter your personal details and start your jouerny with us
                    </p>
                    <a href="register.php" class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="registerLink">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- Login Form End -->
<?php include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#login-btn').click(function (e) {
            if ($('#loginForm')[0].checkValidity()) {
                e.preventDefault();
                $(this).val("Please Wait!...");
                $.ajax({
                    url : '../../private/actions.php',
                    method: 'post',
                    data: $('#loginForm').serialize() + '&action=login',
                    success: (response) => {
                        const json = JSON.parse(response);
                        if (json.status == false) {
                            Swal.fire({
                                icon: 'error',
                                title: json.message,
                            });
                        } else {
                            window.location = '../../index.php';
                        }
                    }
                });
                $(this).val("Sign In");
            }
        });
    });
</script>