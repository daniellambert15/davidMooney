<?php

// this is a quick script just to see if the values on the form are not blank. if they are, then the user will not get
// though to the questions page.

// first start sessions
session_start();


$_SESSION['name'] = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : false;
$_SESSION['email'] = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : false;
$_SESSION['contactNumber'] = (isset($_REQUEST['contactNumber'])) ? $_REQUEST['contactNumber'] : false;
$_SESSION['address'] = (isset($_REQUEST['address'])) ? $_REQUEST['address'] : false;
$_SESSION['company'] = (isset($_REQUEST['company'])) ? $_REQUEST['company'] : false;
$error = false;

// lets see if they've processed the form.
if(isset($_REQUEST['submit'])){

    // if they have, then check if they've filled out the form correctly.
    if($_SESSION['name'] && $_SESSION['email'] && $_SESSION['contactNumber'] && $_SESSION['address'] && $_SESSION['company']){
        // seems like they've submitted the form correctly. Now we just fire them off to the questions page
        header('Location: questions.php');
        exit;
    }else{

        // uh-oh, send them an error so they can try again!
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Treating Customers Fairly Assessment</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Treating Customers Fairly Assessment</h2>
        </div>
    </div>

    <?php if($error == true){ ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-danger" role="alert">There are problems on the form. Please rectify the errors and try again.</div>
            </div>
        </div>
    <?php } ?>
    <form action="index.php" method="post">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Details:</div>
                    <div class="panel-body">
                        <p>Please fill in the form below and then click submit to start the questionnaire.</p>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"
                                   name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"
                                   name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control"
                                   name="contactNumber" placeholder="Contact Number" value="<?php echo $_SESSION['contactNumber']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control"
                                   name="company" placeholder="Company" value="<?php echo $_SESSION['company']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control"
                                      name="address" placeholder="Your Address"><?php echo $_SESSION['address']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="submit" class="btn btn-success col-xs-12" name="submit">
            </div>
        </div>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
