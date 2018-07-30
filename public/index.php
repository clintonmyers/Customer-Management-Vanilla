<?php include $_SERVER['DOCUMENT_ROOT'].'/backend/login-backend.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
    <div id="bg">
        <div id="header">
            <div id="logo"></div>
            <div id="registerLogin">
                <a href="index.php" class="btn btn-primary">Log In</a>
                <a href="register.php" class="btn btn-danger">Register</a>
            </div>
        </div>
        <div id="alpha">
            <form class="col-sm-10 col-md-8 col-lg-6 col-xl-4" action="index.php" method="post">
                <div class="form-group">
                    <label for="username"><h3>Username</h3></label>
                    <input type="username" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password"><h3>Password</h3></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <button type="submit" name="submit-login" class="btn btn-primary">Log In</button>
            </form>
        </div>
        <div id="message">
            <?php echo "$output"; ?>
        </div>
        <div id="footer">
            <h4>Clint Myers &copy;2018</h4>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>