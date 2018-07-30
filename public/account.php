<?php include $_SERVER['DOCUMENT_ROOT'].'/backend/account-backend.php'; ?>

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
                <a href="logout.php" class="btn btn-danger">Log out</a>
            </div>
        </div>
        <div id="alpha">
            <div class="form-group col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <?php echo '<h1>Welcome back '.$username.'</h1><br>';
                echo '<h3>Here are your customers:</h3><br>';

                $i = 0; // variable i used for incrementing variable in foreach loop
                // The loop generates the list of customers, as well as a removal button for each customer
            
                foreach($customers as $customer) {
                    echo '<form action="account.php" method="post">';
                    echo ($i + 1).'. '.$customer;
                    echo '<input type="submit" name="remove" class="btn btn-danger btn-sm float-right" value="Remove" />';
                    echo '<input type="hidden" name="index" value="'.$i.'" />';
                    echo '</form>';
                    echo '<br>';

                    $i++;
                }

                ?>

                <form action="account.php" method="post" class="row">
                    <input type="text" name="new-customer" class="form-control col-8" id="username" placeholder="Enter customer">
                    <button type="submit" name="add-customer" class="btn btn-primary col-4">Add Customer</button>
                </form>
            </div>
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