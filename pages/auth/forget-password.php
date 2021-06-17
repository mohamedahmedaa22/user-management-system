<?php
    $pageTitle = "Forget Password";
    include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-header.php';
?>
<!-- Forget Password Form Start -->
    <div class="row justify-content-cetner wrapper" id="login-box">
        <div class="col-lg-12 my-auto">
            <div class="card-group myShadow">

                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">
                        Remeber Password!
                    </h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">
                        If you know your password or feel somthing is wrong, go back to login page
                    </p>
                    <a href="login.php" class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="registerLink">
                        Login
                    </a>
                </div>

                <div class="card rounded-left p-4" style="flex-grow: 1.4">
                    <h1 class="text-center font-weight-bold text-primary">Forget Password</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" id="forgetPasswordForm">
                        <p class="text-center text-secondary">
                            Please enter your email to reset your password and you'll receive an email with the reset link
                        </p>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-Mail..." required>                                
                        </div>
                        <!-- Email Field -->

                        <div class="form-group">
                            <input type="submit" value="Reset Password" id="reset-password-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                <!-- Login Card -->
            </div>
        </div>
    </div>
<!-- Forget Password Form End -->
<?php include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-footer.php'; ?>
<script>
    $(document).ready(function(){
        $('#reset-password-btn').click(function(e) {
            if ($('#forgetPasswordForm')[0].checkValidity()) {
                e.preventDefault();
                $(this).val('Please Wait!..');
                $.ajax({
                    url: '../../private/actions.php',
                    method: 'post',
                    data: $('#forgetPasswordForm').serialize() + '&action=forgetPassword',
                    success: (response) => {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>