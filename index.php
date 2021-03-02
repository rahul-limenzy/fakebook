<?php
include 'controllers/loginAction.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <title>fakebook</title>
    </head>
    <body class="index">
        <div class="container-fluid">
            <div class="row mainrow">
                <div class="col-md my-3 my-md-4 mx-3 ml-md-4 p-0">
                    <img class="img-fluid logo" src="images/logo.jpg">
                </div>
                <div class="col-md-4 shadow rounded bg-white m-4 p-3">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <?php if (array_key_exists('email', $loginError)) : ?>
                                <span class="error col"><?php echo $loginError['email']; ?></span>
                            <?php endif; ?>
                            <input type="test" name="email" class="form-control" placeholder="xyz@example.com">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <?php if (array_key_exists('password', $loginError)) : ?>
                                <span class="error col"><?php echo $loginError['password']; ?></span>
                            <?php endif; ?>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                        <a class="btn btn-outline-primary btn-block" href="views/signup.php">signup</a>
                    </form>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#pwdreset">forgot password?</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-md-4">
                    <p class="display-4 tagline">fakebook helps you connect with friends in your life.</p>
                </div>
            </div>
            <div class="modal" id="pwdreset">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reset your password</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h6>search for your account</h6>
                            <form>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="xyz@example.com">
                            </div>
                            <p> OR </p>
                            <div class="form-group">
                                <label>Mobile number</label>
                                <input type="tel" class="form-control" placeholder="mobile">
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class=" fixed-bottom">
            <div class="container-fluid footer bg-light">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <p class="rights">all rights reserved.</p>                        
                    </div>
                    <div class="col-auto footer-link">
                        <ul class="nav">
                            <li class="d-inline-block px-2 py-md-2"><a class="footer-link" href="#">Help</a></li>
                            <li class="d-inline-block px-2 py-md-2"><a class="footer-link" href="#">Privacy</a></li>
                            <li class="d-inline-block px-2 py-md-2"><a class="footer-link" href="#">Terms</a></li>
                            <li class="d-inline-block px-2 py-md-2"><a class="footer-link" href="#">Advertising</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>