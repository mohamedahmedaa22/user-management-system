<?php
    $pageTitle = "Sign Up";
    include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-header.php';
?>
<!-- Register Form Start -->
<div class="row justify-content-cetner wrapper" id="register-box">
        <div class="col-lg-12 my-auto">
            <div class="card-group myShadow">
            <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">
                        Hello, Friend!
                    </h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">
                        Already have an account, try login instead from button below!
                    </p>
                    <a href="login.php" class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="loginLink">
                        Login 
                    </a>
                </div>
                
                <!-- Register Card -->
                <div class="card rounded-left p-4" style="flex-grow: 1.4">
                    <h1 class="text-center font-weight-bold text-primary">Create New Account</h1>
                    <hr class="my-3">
                    <form action="" method="post" class="px-3" id="registerForm">
                    
                    <div class="form-group">
                        <div id="errors" class="alert-danger p-3" role="alert" style="display: none;">
                            
                        </div>
                    </div>

                    <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-lg"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name..." required>                                
                        </div>
                        <!-- Full Name Field -->

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-Mail..." required>                                
                        </div>
                        <!-- Email Field -->

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control rounded-0" minlength="5" placeholder="Password..." required>                                
                        </div>
                        <!-- Password Field -->

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                </span>
                            </div>
                            <input type="password" name="repassword" id="repassword" class="form-control rounded-0" placeholder="Confirm Password..." minlength="5" required>                                
                        </div>
                        <!-- Password Field -->

                        <div class="form-group">
                            <input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>            
<!-- Register Form End -->

<?php $customScript = <<<HERE
<!-- Custom Scripts For this Page -->
<script>
    $(document).ready(function() {
        $('#register-btn').click(function (e) {
            if ($('#registerForm')[0].checkValidity()) {
                e.preventDefault();
                $(this).val("Please Wait...");
                if ($('#password').val() != $('#repassword').val()) {
                    $('#errors').show(); 
                    $('#errors').append('- Passwords did not matched!');
                } else {
                    $('#errors').hide();
                    $.ajax({
                        url: '../private/actions.php',
                        method: 'post',
                        data: $('#registerForm').serialize()+'&action=register',
                        success: function(response) {
                            let json = JSON.parse(response);
                            if (!json.status) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: json.action,
                                    text: json.message
                                });
                            } else {
                                window.location = '../index.php';
                            }
                        }
                    });
                }
                $(this).val("Sign Up");
            }
        });
    });
    
</script>
HERE;
?>

<?php include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'auth-footer.php'; ?>