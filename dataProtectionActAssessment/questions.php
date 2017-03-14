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
        $email->title = 'Data Protection Act Assessment';

        // build the email
        $emailContent = '

        <ul>
            <li>Question: 1) What year was the Data Protection Act first created?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['1-1'].'</li>
                     <li>'.$_POST['1-2'].'</li>
                     <li>'.$_POST['1-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 2) What is the person in charge of data in an organisation called?  </li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['2-1'].'</li>
                     <li>'.$_POST['2-2'].'</li>
                     <li>'.$_POST['2-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 3) What do the following initials stand for?</li>
            <li>Answer: '.$_POST['3'].'</li>
        </ul>

        <ul>
            <li>Question: 4) How many Data Protection principles are there?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['4-1'].'</li>
                     <li>'.$_POST['4-2'].'</li>
                     <li>'.$_POST['4-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 5) Name 3 countries outside of EEA who have an adequate level of protection rating by ICO?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['5-1'].'</li>
                     <li>'.$_POST['5-2'].'</li>
                     <li>'.$_POST['5-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 6) How many days do you have to respond to a Subject Access Request?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['6-1'].'</li>
                     <li>'.$_POST['6-2'].'</li>
                     <li>'.$_POST['6-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 7) Fill in the blanks of Data Protection Principle 3</li>
            <li>Answer:
                <p>Personal data shall be <strong>'.$_POST['7-1'].'</strong>, relevant and not <strong>'.$_POST['7-2'].'</strong> in relation to the purpose or purposes for which they are processed.</p>
            </li>
        </ul>

        <ul>
            <li>Question: 8) Personal data is defined as:</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['8-1'].'</li>
                     <li>'.$_POST['8-2'].'</li>
                     <li>'.$_POST['8-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 9) The Information Commissioners Office can award compensation for breaches?</li>
            <li>Answer: '.$_POST['9'].'</li>
        </ul>

        <ul>
            <li>Question: 10) Which of the following are \'sensitive\' personal data? (pick one or more)</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['10-1'].'</li>
                     <li>'.$_POST['10-2'].'</li>
                     <li>'.$_POST['10-3'].'</li>
                     <li>'.$_POST['10-4'].'</li>
                     <li>'.$_POST['10-5'].'</li>
                     <li>'.$_POST['10-6'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 11) You can charge up to £10.00 for a Subject Access Request?</li>
            <li>Answer: '.$_POST['11'].'</li>
        </ul>

        <ul>
            <li>Question: 12) You are always legally obliged to release personal data to the police when requested?</li>
            <li>Answer: '.$_POST['12'].'</li>
        </ul>

        <ul>
            <li>Question: 13) The 4th Data Protection Principle requires that personal data is accurate, and where it is deemed to be inaccurate, the individual concerned has the right to:</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['13-1'].'</li>
                     <li>'.$_POST['13-2'].'</li>
                     <li>'.$_POST['13-3'].'</li>
                </ol>
            </li>
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
    <title>Data Protection Act Assessment</title>
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

	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="http://fcacomplianceservices.com/">FCA Compliance Services</a>
	    </div>
	    <div id="navbar" class="collapse navbar-collapse">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="http://fcacomplianceservices.com/">Home</a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	<div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-xs-12">
                <h2>Data Protection Act Assessment</h2>
                <p>
                    Please note: There may be more than one answer to some of the questions.
                </p>
            </div>
        </div>
        <?php if($completed){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Thank you for taking part in this Data Protection Act Assessment. You will be contacted shortly with the results.</div>
                </div>
            </div>
        <?php } ?>

        <form action="questions.php" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1:</div>
                        <div class="panel-body">
                            <p><strong>What year was the Data Protection Act first created?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-1" value="1984"> 1984
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-2" value="1988"> 1988
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="1-3" value="1998"> 1998
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
                            <p><strong>What is the person in charge of data in an organisation called?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-1" value="Data Controller"> Data Controller
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-2" value="Data Subject"> Data Subject
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-3" value="Data Processor"> Data Processor
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
                            <p><img class="img-responsive" width="100" src="../images/ico-logo.jpg"></p>
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
                            <p><strong> How many Data Protection principles are there?  </strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-1" value="6"> 6
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-2" value="8"> 8
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-3" value="9"> 9
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
                            <p><strong>Name 3 countries outside of EEA who have an adequate level of protection rating by ICO?</strong></p>
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
                            <p><strong>How many days do you have to respond to a Subject Access Request?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-1" value="20"> 20
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-2" value="30"> 30
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-3" value="40"> 40
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
                        <div class="panel-heading">Question 7:</div>
                        <div class="panel-body">
                            <p><strong>Fill in the blanks of Data Protection Principle 3  </strong></p>
                            <p>Personal data shall be <input type="text" name="7-1">, relevant and not <input type="text" name="7-2"> in relation to the purpose or purposes for which they are processed.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>Personal data is defined as:</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-1" value="Data relating to a living individual who can be identified by that data"> Data relating to a living individual who can be identified by that data
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-2" value="Data relating to a living or deceased individual who can be identified by that data"> Data relating to a living or deceased individual who can be identified by that data
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-3" value="Data relating to a living individual who may or may not be identified by that data."> Data relating to a living individual who may or may not be identified by that data.
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
                            <p><strong>The Information Commissioners Office can award compensation for breaches?</strong></p>
                            <select name="9" class="form-control">
                                <option value="Please select" selected>-- PLEASE SELECT --</option>
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
                        <div class="panel-heading">Question 10:</div>
                        <div class="panel-body">
                            <p><strong>Which of the following are 'sensitive' personal data? (pick one or more)</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-1" value="Name"> Name
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-2" value="Political views"> Political views
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-3" value="Ethnic origin"> Ethnic origin
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-4" value="Age"> Age
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-5" value="Gender"> Gender
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-6" value="Trade Union membership"> Trade Union membership
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
                        <div class="panel-heading">Question 11:</div>
                        <div class="panel-body">
                            <p><strong>You can charge up to £10.00 for a Subject Access Request?</strong></p>
                            <select class="form-control" name="11">
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
                        <div class="panel-heading">Question 12:</div>
                        <div class="panel-body">
                            <p><strong>You are always legally obliged to release personal data to the police when requested?</strong></p>
                            <select class="form-control" name="12">
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
                        <div class="panel-heading">Question 13:</div>
                        <div class="panel-body">
                            <p><strong>The 4th Data Protection Principle requires that personal data is accurate, and where it is deemed to be inaccurate, the individual concerned has the right to:</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-1" value="Apply for a court order to rectify, block, erase or destroy the information"> Apply for a court order to rectify, block, erase or destroy the information
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-2" value="Sue the company holding the data"> Sue the company holding the data
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-3" value="The individual has no rights in this instance"> The individual has no rights in this instance
                                    </label>
                                </li>
                            </ol>
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
