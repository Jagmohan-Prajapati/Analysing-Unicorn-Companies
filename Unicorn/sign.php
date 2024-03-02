<?php

$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("connect.php");
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from `registration` where username='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "user already exists";
            $user = 1;
        } else {
            $sql = "insert into `registration`(username,password) values('$username','$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // echo 'Sign up successfully';
                $success = 1;
            } else {
                die(mysqli_error($con));
            }
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: #121;
        }
        h1,label{
            color: white;
        }
    </style>
</head>

<body>
    <?php

    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ohh!!!!!</strong> User already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

    <?php

    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong></strong> You have signed up successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    ?>
    <h1 class="text-center">Sign Up</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Enter Username" name="username">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Enter your password" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>
    </div>
</body>

</html>