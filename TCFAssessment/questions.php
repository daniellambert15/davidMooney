<?php

    // load the sessions from the previous form submit
    session_start();

    require '../classes/email.php';

    $completed = false;

    // check if form has been posted
    if(isset($_REQUEST['submit']))
    {

        // setup the email class, give it the users details.
        $email = new email($_SESSION['name'], $_SESSION['email'], $_SESSION['contactNumber'], $_SESSION['address'], $_SESSION['company']);


        // Tell the form that its been submit.
        $completed = true;

        // its going to
        $email->to = "fcacomplianceservices@gmail.com";

        // its coming from
        $email->from = "info@fcacomplianceservices.com";

        // set the title
        $email->title = 'Treating Customers Fairly Assessment';

        // build the email
        $emailContent = '

        <ul>
            <li>Question: 1) TCF is about</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['1-1'].'</li>
                     <li>'.$_POST['1-2'].'</li>
                     <li>'.$_POST['1-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 2) How many desired outcomes are there for TCF</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['2-1'].'</li>
                     <li>'.$_POST['2-2'].'</li>
                     <li>'.$_POST['2-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 3) Whose logo is this?</li>
            <li>Answer: '.$_POST['3'].'</li>
        </ul>

        <ul>
            <li>Question: 4) TCF stands for?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['4-1'].'</li>
                     <li>'.$_POST['4-2'].'</li>
                     <li>'.$_POST['4-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 5) Name 3 areas of your organisation where TCF should be applied</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['5-1'].'</li>
                     <li>'.$_POST['5-2'].'</li>
                     <li>'.$_POST['5-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 6) TCF is the practical realisation of one of the FCA’s core principles:</li>
            <li>"A Firm must pay due regard to the interests of its customers and treat them fairly."</li>
            <li>Answer: '.$_POST['6'].'</li>
        </ul>

        <ul>
            <li>Question: 7) Fill in the blanks of Treating Customers Fairly Outcome 3</li>
            <li>Answer: \'Consumers are provided with <strong>'.$_POST['7-1'].'</strong> information and kept appropriately <strong>'.$_POST['7-2'].'</strong> before, during and after the point of sale\'</li>
        </ul>

        <ul>
            <li>Question: 8) A customer raises a complaint with you. Do you:</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['8-1'].'</li>
                     <li>'.$_POST['8-2'].'</li>
                     <li>'.$_POST['8-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 9) A customer asks who you are and what you do. Do you:</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['9-1'].'</li>
                     <li>'.$_POST['9-2'].'</li>
                     <li>'.$_POST['9-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 10) TCF is not applicable to my role and/or organisation?</li>
            <li>Answer: '.$_POST['10'].'</li>
        </ul>
        ';


        $email->buildTheEmail($emailContent);

        // now we fire off the email
        if($email->email())
        {
            $completed = true;
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
    <style>
        label {display: block;}
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Treating Customers Fairly Assessment</h2>
                <p>
                    Please note: There may be more than one answer to some of the questions.
                </p>
            </div>
        </div>
        <?php if($completed){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Thank you for taking part in this Treating Customers Fairly Assessment. You will be contacted shortly with the results.</div>
                </div>
            </div>
        <?php } ?>

        <form action="questions.php" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1:</div>
                        <div class="panel-body">
                            <p><strong>TCF is about?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-1" value="Creating satisfied customers."> Creating satisfied customers.
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-2" value="Providing clear and transparent services or products to customers."> Providing clear and transparent services or products to customers.
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-3" value="Treating every customer in the same way."> Treating every customer in the same way.
                                    </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 2:</div>
                        <div class="panel-body">
                            <p><strong>How many desired outcomes are there for TCF?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-1" value="5"> 5
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-2" value="8"> 8
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-3" value="6"> 6
                                    </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 3:</div>
                        <div class="panel-body">
                            <p><strong>Whose logo is this?</strong></p>
                            <p><img class="img-responsive" src="../images/logo.jpg"></p>
                            <input type="text" name="3" class="form-control" placeholder="Whose is the above logo?">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 4:</div>
                        <div class="panel-body">
                            <p><strong>TCF stands for?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-1" value="Treating Consumers Fairly"> Treating Consumers Fairly
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-2" value="Testing Customers Fairly"> Testing Customers Fairly
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-3" value="Treating Customers Fairly"> Treating Customers Fairly
                                    </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 5:</div>
                        <div class="panel-body">
                            <p><strong>Name 3 areas of your organisation where TCF should be applied</strong></p>

                            <div class="form-group">
                                <label for="5-1">Answer 1</label>
                                <input type="text" class="form-control" name="5-1">
                            </div>
                            <div class="form-group">
                                <label for="5-2">Answer 2</label>
                                <input type="text" class="form-control" name="5-2">
                            </div>
                            <div class="form-group">
                                <label for="5-3">Answer 3</label>
                                <input type="text" class="form-control" name="5-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 6:</div>
                        <div class="panel-body">
                            <p><strong>TCF is the practical realisation of one of the FCA’s core principles</strong></p>
                            <p>"A Firm must pay due regard to the interests of its customers and treat them fairly."</p>
                            <select class="form-control" name="6">
                                <option value="Please Select" selected>-- PLEASE SELECT --</option>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 7:</div>
                        <div class="panel-body">
                            <p><strong>Fill in the blanks of Treating Customers Fairly Outcome 3</strong></p>
                            <p>'Consumers are provided with <input type="text" name="7-1"> information and kept appropriately <input type="text" name="7-2"> before, during and after the point of sale'</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>A customer raises a complaint with you. Do you:</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-1" value="Tell them there is no point complaining because you have been through everything with them already and there are no other solutions"> Tell them there is no point complaining because you have been through everything with them already and there are no other solutions
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-2" value="Give them your regulator and Financial Ombudsman Service details"> Give them your regulator and Financial Ombudsman Service details
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-3" value="Provide them with your complaints procedure and full contact details"> Provide them with your complaints procedure and full contact details
                                    </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 9:</div>
                        <div class="panel-body">
                            <p><strong>A customer asks who you are and what you do. Do you:</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-1" value="Provide them with your full name, company name and explain the nature of the business and the reason for your call "> Provide them with your full name, company name and explain the nature of the business and the reason for your call
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-2" value="Give them your first name and advise you will explain everything else as you go along"> Give them your first name and advise you will explain everything else as you go along
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-3" value="Advise that you cannot give them any details over the phone but after they have agreed to take your service you will send them everything they have requested in writing"> Advise that you cannot give them any details over the phone but after they have agreed to take your service you will send them everything they have requested in writing
                                    </label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 10:</div>
                        <div class="panel-body">
                            <p><strong>TCF is not applicable to my role and/or organisation?</strong></p>
                            <select name="10" class="form-control">
                                <option value="please select" selected>-- PLEASE SELECT --</option>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
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
