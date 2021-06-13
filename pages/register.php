<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS - User Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Container Start -->
    <div class="container">
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
                            <form action="" method="post" class="px-3" id="loginForm">
                            <div class="input-group input-group-lg form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0">
                                            <i class="far fa-user fa-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="E-Mail..." required>                                
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
    </div>
    <!-- Container End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>