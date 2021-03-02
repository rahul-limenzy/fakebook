<?php
 include '../controllers/moredetailsAction.php';
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
                    <h1 class="mb-2">Add More Details.</h1>
                    <hr>
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST" >
                        <input type="hidden" name="id" value="<?= $thisUser['id'] ?>" >
                        
                        <div class="form-group col">
                            <label>10th std Grade Point Average </label>
                            <input type="number" name="tenthgpa" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label>10th std Year of passing </label>
                            <input type="number" name="tenthyop" min="1900" max="2099" step="1" value="2016" />
                        </div>
                        <div class="form-group col">
                            <label>12th std Grade Point Average </label>
                            <input type="number" name="plustwogpa" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label>12th std Year of passing </label>
                            <input type="number" name="plustwoyop" min="1900" max="2099" step="1" value="2016" />
                        </div>

                        <div class="row pt-3">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary col-3 mx-auto">
                            <a class="btn btn-outline-primary col-3 mx-auto" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">cancel</a>
                            
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