<?php

    // load the sessions from the previous form submit
    session_start();

    require '../classes/email.php';

    $completed = false;

    // check if form has been posted
    if(isset($_REQUEST['submit']))
    {

        // setup the email class, give it the users details.
        $email = new email($_POST['name'], $_POST['email'], $_POST['contactNumber'], $_POST['address'], $_POST['company']);

        // Tell the form that its been submit.
        $completed = true;

        // its going to
        $email->to = "fcacomplianceservices@gmail.com";

        // its coming from
        $email->from = "info@fcacomplianceservices.com";

        // set the title
        $email->title = 'Anti-Bribery Quiz';

        // build the email
        $emailContent = '
        <ul>
            <li>Question: 1) In what year did the Bribery Act come into Force?</li>
            <li>Answer: '.$_POST['1'].'</li>
        </ul>
        <ul>
            <li>Question: 2) Does a firm need to employ consultants or solicitors to provide advice on the risks they face, the procedures your firm should adopt, or the level of due diligence your firm should take?</li>
            <li>Answer: '.$_POST['2'].'</li>
        </ul>
        <ul>
            <li>Question: 3) Can I provide hospitality, promotional or other business expenditure under the Act?</li>
            <li>Answer: '.$_POST['3'].'</li>
        </ul>
        <ul>
            <li>Question: 4) Which of the following statements most accurately describes one of the main objectives of the Bribery Act?</li>
            <li>Answer: '.$_POST['4'].'</li>
        </ul>
        <ul>
            <li>Question: 5) Does your firm have a documented Anti-Bribery Procedure?</li>
            <li>Answer: '.$_POST['5'].'</li>
        </ul>
        <ul>
            <li>Question: 6) If you suspect or if you are concerned that there has been any breach of the firm&rsquo;s anti-bribery policy then what should you do?</li>
            <li>Answer: '.$_POST['6'].'</li>
        </ul>
        <ul>
            <li>Question: 7) These two examples are Bribery offences:
				<ol>
					<li>Disproportionate gifts or hospitality</li>
					<li>Provider incentives or benefits</li>
				</ol>
			</li>
            <li>Answer: '.$_POST['7'].'</li>
        </ul>
        <ul>
            <li>Question: 8) How many Anti-Bribery Principles are there?</li>
            <li>Answer: '.$_POST['8'].'</li>
        </ul>
        <ul>
            <li>Question: 9) Have you read your Conflicts of Interest, Bribery and Gifts Procedure?</li>
            <li>Answer: '.$_POST['9'].'</li>
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
    <title>Anti-Money Laundering Assessment</title>
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
	<?php if($completed){ ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="alert alert-success" role="alert">Thank you for submitting your answers. We will be in contact with you shortly.</div>
			</div>
		</div>
	<?php } ?>
        <div class="row">
            <div class="col-xs-12">
				<h2>Anti-Bribery Training Quiz</h2>
				<p>
					Can you answer these questions?
            	</p>
		    </div>
		</div>

        <form action="questions.php" id="ABT" name="ABT" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Your Details</div>
                        <div class="panel-body">
                            <?php
                                $error = (!isset($_REQUEST['name'])) ? true : false;
                                $error = (!isset($_REQUEST['email'])) ? true : false;
                                $error = (!isset($_REQUEST['contactNumber'])) ? true : false;
                                $error = (!isset($_REQUEST['address'])) ? true : false;
                                $error = (!isset($_REQUEST['company'])) ? true : false;

                            if($error){
                            ?>
                            <div class="alert alert-danger" role="alert">If your details are not below, please re-type them.</div>
                            <?php } ?>
                            <div class="well col-xs-4">
                                <label for="name">Name</label>
                                <input required name="name" value="<?php echo $_SESSION['name']; ?>" class="form-control" type="text">
                            </div>
                            <div class="well col-xs-4">
                                <label for="email">Email</label>
                                <input required name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" type="email">
                            </div>
                            <div class="well col-xs-4">
                                <label for="contactNumber">Contact Number</label>
                                <input required name="contactNumber" value="<?php echo $_SESSION['contactNumber']; ?>" class="form-control" type="text">
                            </div>
                            <div class="well col-xs-4">
                                <label for="address">Address</label>
                                <input required name="address" value="<?php echo $_SESSION['address']; ?>" class="form-control" type="text">
                            </div>
                            <div class="well col-xs-4">
                                <label for="company">Company</label>
                                <input required name="company" value="<?php echo $_SESSION['company']; ?>" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1:</div>
                        <div class="panel-body">
                            <p><strong>In what year did the Bribery Act come into Force?</strong></p>
                            <textarea class="form-control" name="1"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 2:</div>
                        <div class="panel-body">
                            <p><strong>Does a firm need to employ consultants or solicitors to provide advice on the risks they face, the procedures your firm should adopt, or the level of due diligence your firm should take?</strong></p>
                            <textarea class="form-control" name="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 3:</div>
                        <div class="panel-body">
                            <p><strong>Can I provide hospitality, promotional or other business expenditure under the Act?</strong></p>
							<textarea class="form-control" name="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 4:</div>
                        <div class="panel-body">
                            <p><strong>Which of the following statements most accurately describes one of the main objectives of the Bribery Act?</strong></p>
							<p>
								Choose the ONE best answer:
							</p>
                            <select name="4" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="Stopping companies that are competing for major government contracts from engaging in price-fixing.">Stopping companies that are competing for major government contracts from engaging in price-fixing.</option>
                                <option value="Stopping corrupt individuals from accepting cash in return for acting improperly in their employment.">Stopping corrupt individuals from accepting cash in return for acting improperly in their employment.</option>
								<option value="Preventing crooked company directors from siphoning funds away from the hands of shareholders.">Preventing crooked company directors from siphoning funds away from the hands of shareholders.</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 5:</div>
                        <div class="panel-body">
                            <p><strong>Does your firm have a documented Anti-Bribery Procedure?</strong></p>

							<select name="5" class="form-control">
								<option value="select">- Please Select -</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
								<option value="Dont Know">Don't know</option>
							</select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 6:</div>
                        <div class="panel-body">
                            <p><strong>f you suspect or if you are concerned that there has been any breach of the firm’s anti-bribery policy then what should you do?</strong></p>
                            <p>Choose the ONE best answer:</p>
                            <select name="6" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="Nothing">Nothing</option>
                                <option value="Report this information to your compliance officer, or the person responsible for compliance.">Report this information to your compliance officer, or the person responsible for compliance.</option>
                                <option value="Tell your friends and family when you get home.">Tell your friends and family when you get home.</option>
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
                            <p><strong>These two examples are Bribery offences:</strong></p>
							<ol>
								<li>Disproportionate gifts or hospitality</li>
								<li>Provider incentives or benefits</li>
							</ol>
							<select name="7" class="form-control">
								<option value="select">- Please Select -</option>
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
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>How many Anti-Bribery Principles are there?</strong></p>
							6<br />
							7<br />
							8<br />
							<select name="8" class="form-control">
								<option value="select">- Please Select -</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 9:</div>
                        <div class="panel-body">
                            <p><strong>Have you read your Conflicts of Interest, Bribery and Gifts Procedure?</strong></p>
							<select name="9" class="form-control">
								<option value="select">- Please Select -</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
								<option value="Dont Know">Don't know</option>
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
