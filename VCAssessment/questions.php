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
        $completed = false;

        // its going to
        $email->to = "fcacomplianceservices@gmail.com";

        // its coming from
        $email->from = "info@fcacomplianceservices.com";

        // set the title
        $email->title = 'Vulnerable Customers Assessment';

        // build the email
        $emailContent = '

        <ul>
            <li>Question: 1) Fill in the blanks on the below 2 definitions?</li>
            <li>Answer: </li>
            <li>\'Customers who are <strong>'.$_POST['1-1'].'</strong>, for whatever reason, to make an <strong>'.$_POST['1-2'].'</strong> decision at the time of dealing with them\'</li>
            <li>\'Customers whose <strong>'.$_POST['1-3'].'</strong> (financial, mental or physical) could be put at <strong>'.$_POST['1-4'].'</strong> through choosing the service or product you offer\'</li>
        </ul>

        <ul>
            <li>Question: 2) Which of the below could be a sign of a customer’s vulnerability? (you can choose more than 1)</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['2-1'].'</li>
                     <li>'.$_POST['2-2'].'</li>
                     <li>'.$_POST['2-3'].'</li>
                     <li>'.$_POST['2-4'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 3) The Mental Health Act is applicable to dealing with vulnerable customers?</li>
            <li>Answer: '.$_POST['3'].'</li>
        </ul>

        <ul>
            <li>Question: 4) Vulnerable Customers goes hand in hand with?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['4-1'].'</li>
                     <li>'.$_POST['4-2'].'</li>
                     <li>'.$_POST['4-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 5) Name 3 categories of vulnerable customers?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['5-1'].'</li>
                     <li>'.$_POST['5-2'].'</li>
                     <li>'.$_POST['5-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 6) You should always terminate a call once you realise that a customer is vulnerable</li>
            <li>Answer: '.$_POST['6'].'</li>
        </ul>

        <ul>
            <li>Question: 7) List 2 things that you could do to help a vulnerable customer?</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['7-1'].'</li>
                     <li>'.$_POST['7-2'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 8) A customer mention to you that their Husband recently passed away. Do you:</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['8-1'].'</li>
                     <li>'.$_POST['8-2'].'</li>
                     <li>'.$_POST['8-3'].'</li>
                </ol>
            </li>
        </ul>

        <ul>
            <li>Question: 9) I don\'t speak to customers on the phone or face to face so learning about vulnerable customers is not applicable to me or my job role.</li>
            <li>Answer: '.$_POST['9'].'</li>
        </ul>

        <ul>
            <li>Question: 10) The customer you have been speaking to has agreed to the product/service that you are offering but has displayed signs of being hard of hearing through the conversation.</li>
            <li>Answer:
                <ol>
                     <li>'.$_POST['10-1'].'</li>
                     <li>'.$_POST['10-2'].'</li>
                     <li>'.$_POST['10-3'].'</li>
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
    <title>Vulnerable Customers Assessment</title>
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
                <h2>Vulnerable Customers Assessment</h2>
                <p>
                    Please note: There may be more than one answer to some of the questions.
                </p>
            </div>
        </div>
        <?php if($completed){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Thank you for taking part in this Vulnerable Customers Assessment. You will be contacted shortly with the results.</div>
                </div>
            </div>
        <?php } ?>

        <form action="questions.php" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1:</div>
                        <div class="panel-body">
                            <p><strong>Fill in the blanks on the below 2 definitions?</strong></p>
                            <p>'Customers who are <input type="text" name="1-1">, for whatever reason, to make an <input type="text" name="1-2"> decision at the time of dealing with them'</p>
                            <p>'Customers whose <input type="text" name="1-3"> (financial, mental or physical) could be put at <input type="text" name="1-4"> through choosing the service or product you offer'</p>
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
                            <p><strong>Which of the below could be a sign of a customer’s vulnerability? (you can choose more than 1)  </strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-1" value="Confusion and misunderstandings"> Confusion and misunderstandings
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-2" value="Speaking quite fast"> Speaking quite fast
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-3" value="Asking you to repeat most things that you have said"> Asking you to repeat most things that you have said
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="2-4" value="Being very decisivea"> Being very decisive
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
                            <p><strong>The Mental Health Act is applicable to dealing with vulnerable customers?</strong></p>
                            <select name="3" class="form-control">
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
                        <div class="panel-heading">Question 4:</div>
                        <div class="panel-body">
                            <p><strong>Vulnerable Customers goes hand in hand with?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-1" value="Information Security"> Information Security
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-2" value="Selling products & services"> Selling products & services
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
                            <p><strong>Name 3 categories of vulnerable customers?</strong></p>
                            <div class="form-group">
                                <label for="name">Answer 1</label>
                                <input type="text" class="form-control" name="5-1">
                            </div>
                            <div class="form-group">
                                <label for="name">Answer 2</label>
                                <input type="text" class="form-control" name="5-2">
                            </div>
                            <div class="form-group">
                                <label for="name">Answer 3</label>
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
                            <p><strong>You should always terminate a call once you realise that a customer is vulnerable</strong></p>
                            <select name="6" class="form-control">
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
                            <p><strong>List 2 things that you could do to help a vulnerable customer?</strong></p>
                            <div class="form-group">
                                <label for="name">Answer 1</label>
                                <input type="text" class="form-control" name="7-1">
                            </div>
                            <div class="form-group">
                                <label for="name">Answer 2</label>
                                <input type="text" class="form-control" name="7-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>A customer mention to you that their Husband recently passed away. Do you:</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-1" value="Offer your sympathy and carry on with the call as normal"> Offer your sympathy and carry on with the call as normal
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-2" value="Advise them that you are now unable to carry on with the call as they have identified themselves as being vulnerable"> Advise them that you are now unable to carry on with the call as they have identified themselves as being vulnerable
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="8-3" value="Offer your sympathy and proceed at a slower pace, ensuring the customer understands what you are discussing and that they are capable of making decisions at this time"> Offer your sympathy and proceed at a slower pace, ensuring the customer understands what you are discussing and that they are capable of making decisions at this time
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
                            <p><strong>I don't speak to customers on the phone or face to face so learning about vulnerable customers is not applicable to me or my job role.</strong></p>
                            <select name="9" class="form-control">
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
                        <div class="panel-heading">Question 10:</div>
                        <div class="panel-body">
                            <p><strong>The customer you have been speaking to has agreed to the product/service that you are offering but has displayed signs of being hard of hearing through the conversation.</strong></p>
                            <p>What could you do to ensure that their vulnerability has been noted and addressed?</p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-1" value="Send everything you have discussed out in writing to the customer and sign them up after they have had time to read through everything"> Send everything you have discussed out in writing to the customer and sign them up after they have had time to read through everything
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-2" value="Nothing, if they have agreed over the phone they must have heard what you were saying"> Nothing, if they have agreed over the phone they must have heard what you were saying
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="10-3" value="Ask to speak to another member of the family and disclose everything you have discussed with the customer to see if the family member agrees also"> Ask to speak to another member of the family and disclose everything you have discussed with the customer to see if the family member agrees also
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
