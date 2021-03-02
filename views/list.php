<?php
session_start();
if ($_SESSION['email'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

include '../models/user.php';


if (empty($_POST['key'])) {
    $result = $userObj->dbFetchAll();
} else
    $result = $userObj->dbSearch($_POST['key']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>fakebook</title>
</head>
<!-- design work pending -->

<body>
    <div class="container-fluid topnav">
        <div class="row">
            <nav class="navbar navbar-light bg-light topnav col-12 float-right">
                <form class="form-inline float-right " action="../controllers/logout.php" method="POST">
                    <input class="btn btn-outline-primary float-right" type="submit" value="Logout"></input>
                </form>
            </nav>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto p-5 shadow rounded bg-white my-3">
                <h2>Users List</h2>
                <hr>
                <form class="float-right p-2" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <input type="text" name='key' class=" form-control d-inline col-8" placeholder="name/email/mobile">
                    <input type="submit" name="submit" value="search" class="btn btn-secondary d-inline">
                </form>

                <?php if ($result) : ?>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">gender</th>
                                <th scope="col">birthday</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['mobile'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['birthday'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id']; ?>"><i class="p-2 fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="moreDetails.php?id=<?= $row['id']; ?>"><i class="fa fa-address-book-o" aria-hidden="true"></i></a>
                                    <a href="javascript:;" data-id="<?= $row['id'] ?>" class="delete" title="Delete">
                                        <i id="delete" class="p-2 fa fa-trash-o" aria-hidden="true"></i>
                                        <form action="../controllers/deleteAction.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;
                    else : ?>
                        <div class="alert alert-danger col-md-4 mx-auto"> No Results! </div>
                    <?php endif; ?>
                    </table>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var deleteConfirmation = confirm("Are you sure you want to delete");
            if (deleteConfirmation) {
                $(this).find('form').submit();
            }
        })
    </script>
</body>

</html>