<?php

require '../controllers/signupAction.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <title>fakebook</title>
</head>
<!-- design work pending -->

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="signupcontainer shadow rounded bg-white p-2 mx-auto p-md-5">
                    <h1 class="mb-2">Sign up for a new account</h1>
                    <hr>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group col">
                            <label>Name</label>
                            <?php if (array_key_exists('name', $error)) : ?>
                                <span class="error col"><?php echo $error['name']; ?></span>
                            <?php endif; ?>
                            <input type="text" name="name" class="form-control" placeholder="John Doe" value="<?php if (!empty($error)) : echo $_POST['name']; endif?>" required>
                        </div>

                        <div class="form-group col">
                            <label>Mobile</label>
                            <?php if (array_key_exists('mobile', $error)) : ?>
                                <span class="error col"><?php echo $error['mobile']; ?></span>
                            <?php endif; ?>
                            <input type="number" name="mobile" class="form-control" placeholder="mobile number" value="<?php if (!empty($error)) : echo $_POST['mobile']; endif?>" required>
                        </div>

                        <div class="form-group col">
                            <label>Email address</label>
                            <?php if (array_key_exists('email', $error)) : ?>
                                <span class="error col"><?php echo $error['email']; ?></span>
                            <?php endif; ?>
                            <input type="email" name="email" class="form-control" placeholder="xyz@example.com" value="<?php if (!empty($error)) : echo $_POST['email']; endif?>" required>
                        </div>

                        <div class="form-group col">
                            <label>Password</label>
                            <?php if (array_key_exists('pwd', $error)) : ?>
                                <span class="error col"><?php echo $error['pwd']; ?></span>
                            <?php endif; ?>
                            <input type="password" name="password" class="form-control" placeholder="password" value="<?php if (!empty($error)) : echo $_POST['password']; endif?>" required>
                        </div>

                        <div class="form-group col">
                            <label> Gender : </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineRadio1" name="gender" value="Male" required>
                                <label class="form-check-label" for="inlineCheckbox1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineRadio2" name="gender" value="Female" >
                                <label class="form-check-label" for="inlineCheckbox2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class=" form-check-input" type="radio" id="inlineRadio3" name="gender" value="Other">
                                <label class="form-check-label" for="inlineCheckbox3">Other</label>
                            </div>
                            <?php if (array_key_exists('gender', $error)) : ?>
                                <span class="error col"><?php echo $error['gender']; ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group col">
                            <label for="birthday">Birthday:</label>
                            <?php if (array_key_exists('bday', $error)) : ?>
                                <span class="error col"><?php echo $error['bday']; ?></span>
                            <?php endif; ?>
                            <input type="date" id="birthday" name="birthday" class="form-control" value="<?php if (!empty($error)) : echo $_POST['birthday']; endif?>" required>
                        </div>

                        <div class="form-group col">
                            <label class="form-label" for="customFile">Upload a profile picture : </picture></label>
                            <input type="file" class="form-control" id="customFile" name="dp" required>
                            <?php if (array_key_exists('dp', $error)) : ?>
                                <span class="error col"><?php echo $error['dp']; ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group form-check ml-3">
                            <input class="form-check-input" type="checkbox" name="check" value="checked" id="defaultCheck1" required>
                            <label class="form-check-label" for="defaultCheck1">
                                I agree to the terms and conditions
                            </label>
                            <?php if (array_key_exists('checkbox', $error)) : ?>
                                <span class="error col"><?php echo $error['checkbox']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="row pt-3">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary col-3 mx-auto">
                            <a class="btn btn-outline-primary col-3 mx-auto" href="../index.php">cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>

</body>

</html>