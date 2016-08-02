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
        $email->title = 'General Knowledge Assessment';

        // build the email
        $emailContent = '
        
        <ul>
            <li>Question: 1) TCF is about?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['1-1'].'</li>
                     <li>'.$_POST['1-2'].'</li>
                     <li>'.$_POST['1-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 2) How many desired outcomes are there for TCF?</li>
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
            <li>Question: 4) What does the FCA do?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['4-1'].'</li>
                     <li>'.$_POST['4-2'].'</li>
                     <li>'.$_POST['4-3'].'</li>
                     <li>'.$_POST['4-4'].'</li>
                     <li>'.$_POST['4-5'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 5) TCF stands for?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['5-1'].'</li>
                     <li>'.$_POST['5-2'].'</li>
                     <li>'.$_POST['5-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 6) When does a customer make their first repayment?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['6-1'].'</li>
                     <li>'.$_POST['6-2'].'</li>
                     <li>'.$_POST['6-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 7) How ca you check a customers\'s understanding of the credit agreement?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['7-1'].'</li>
                     <li>'.$_POST['7-2'].'</li>
                     <li>'.$_POST['7-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 8) Can you offer these finance agreements to commercial customers?</li>
            <li>Answer: '.$_POST['8'].'</li>
        </ul>
        
        <ul>
            <li>Question: 9) What is the withdrawal period and how long does it last?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['9-1'].'</li>
                     <li>'.$_POST['9-2'].'</li>
                     <li>'.$_POST['9-3'].'</li>
                     <li>'.$_POST['9-4'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 10) Can a customer settle their account?</li>
            <li>Answer: '.$_POST['10'].'</li>
        </ul>
        
        <ul>
            <li>Question: 11) Which of the following would be classed as a vulnerable customer?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['11-1'].'</li>
                     <li>'.$_POST['11-2'].'</li>
                     <li>'.$_POST['11-3'].'</li>
                     <li>'.$_POST['11-4'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 12) What actions can you take if you identify a customer as vulnerable?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['12-1'].'</li>
                     <li>'.$_POST['12-2'].'</li>
                     <li>'.$_POST['12-3'].'</li>
                     <li>'.$_POST['12-4'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 13) What do you believe your role/responsibilities to be? (From a customer perspective)?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['13-1'].'</li>
                     <li>'.$_POST['13-2'].'</li>
                     <li>'.$_POST['13-3'].'</li>
                     <li>'.$_POST['13-4'].'</li>
                     <li>'.$_POST['13-5'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 14) What is it important notes must you always remember?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['14-1'].'</li>
                     <li>'.$_POST['14-2'].'</li>
                     <li>'.$_POST['14-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 15) A customers raises a complaint with you. Do you:</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['15-1'].'</li>
                     <li>'.$_POST['15-2'].'</li>
                     <li>'.$_POST['15-3'].'</li>
                </ol>
            </li>
        </ul>
        
        <ul>
            <li>Question: 16) A customer asks who you are and what you do. Do you?</li>
            <li>Answer: 
                <ol>
                     <li>'.$_POST['16-1'].'</li>
                     <li>'.$_POST['16-2'].'</li>
                     <li>'.$_POST['16-3'].'</li>
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
    <title>General Knowledge Assessment</title>
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
                <h2>General Knowledge Assessment</h2>
                <p>
                    Please note: There may be more than one answer to some of the questions.
                </p>
            </div>
        </div>
        <?php if($completed){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Thank you for taking part in this General Knowledge Assessment. You will be contacted shortly with the results.</div>
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
                            <p><strong>What does the FCA do?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-1" value="They regulate the financial services industry to ensure firms stick to the rules"> They regulate the financial services industry to ensure firms stick to the rules
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-2" value="Make sure customers are treated fairly"> Make sure customers are treated fairly
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-3" value="Consumer&#8216;s don&#8216;t fall victim to scams or get tied in to unfair contracts."> Consumer&#8216;s don&#8216;t fall victim to scams or get tied in to unfair contracts.
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-4" value="It puts the retailer first"> It puts the retailer first
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="4-5" value="To fine retailers"> To fine retailers
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
                            <p><strong>TCF stands for?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="5-1" value="Treating Consumers Fairly"> Treating Consumers Fairly
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="5-2" value="Testing Customers Fairly"> Testing Customers Fairly
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="5-3" value="Treating Customers Fairly"> Treating Customers Fairly
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
                        <div class="panel-heading">Question 6:</div>
                        <div class="panel-body">
                            <p><strong>When does a customer make their first repayment?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-1" value="7 days after signing the agreement"> 7 days after signing the agreement
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-2" value="14 days after signing the agreement"> 14 days after signing the agreement
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="6-3" value="1 month after signing the agreement"> 1 month after signing the agreement
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
                            <p><strong>How can you check a customers&#8216;s understanding of the credit agreement?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="7-1" value="Ask them open questions about the credit agreement"> Ask them open questions about the credit agreement
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="7-2" value="At the end of the loan tell them about the credit agreement section by section after you have completed it"> At the end of the loan tell them about the credit agreement section by section after you have completed it
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="7-3" value="You don&#8216;t need to check that they understand as that&#8216;s not your responsibility"> You don&#8216;t need to check that they understand as that&#8216;s not your responsibility
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
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>Can you offer these finance agreements to commercial customers?</strong></p>
                            <select name="8" class="form-control">
                                <option value="Please select" selected>-- Please Select --</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
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
                            <p><strong>What is the withdrawal period and how long does it last?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-1" value="Customer can withdraw from the agreement within 7 days"> Customer can withdraw from the agreement within 7 days
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-2" value="Customer can withdraw from the agreement within 10 days"> Customer can withdraw from the agreement within 10 days
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-3" value="Customer can withdraw from the agreement within 14 days"> Customer can withdraw from the agreement within 14 days
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-4" value="None of the above"> None of the above
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
                            <p><strong>Can a customer settle their account early?</strong></p>
                            <select name="10" class="form-control">
                                <option value="Please select" selected>-- Please Select --</option>
                                <option value="No">No</option>
                                <option value="It depends">It depends</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 11:</div>
                        <div class="panel-body">
                            <p><strong>Which of the following would be classed as a vulnerable customer?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-1" value="Bi Polar"> Bi Polar
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-2" value="Rude and abrupt"> Rude and abrupt
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-3" value="Say&#8216;s &#34;YES&#34; before question is even asked"> Say&#8216;s &#34;YES&#34; before question is even asked
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-4" value="Agitated or confused"> Agitated or confused
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
                        <div class="panel-heading">Question 12:</div>
                        <div class="panel-body">
                            <p><strong>What actions can you take if you identify a customer as vulnerable?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="12-1" value="Ask the customer to have a friend or family member sit in"> Ask the customer to have a friend or family member sit in
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="12-2" value="Leave the appointment"> Leave the appointment
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="12-3" value="Proceed regardless"> Proceed regardless
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="12-4" value="Always advise your line manager"> Always advise your line manager
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
                        <div class="panel-heading">Question 13:</div>
                        <div class="panel-body">
                            <p><strong>What do you believe your role/responsibilities to be? (From a customer perspective)?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-1" value="Earn as much as possible"> Earn as much as possible
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-2" value="Provide clear and concise information"> Provide clear and concise information
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-3" value="Be aware you are responsible for what you say and do"> Be aware you are responsible for what you say and do
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-4" value="Keep all material current"> Keep all material current
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="13-5" value="Embellish the sales script"> Embellish the sales script
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
                        <div class="panel-heading">Question 14:</div>
                        <div class="panel-body">
                            <p><strong>What is it important notes must you always remember?</strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="14-1" value="I can say what I like"> I can say what I like
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="14-2" value="I must complete the documents as I was trained"> I must complete the documents as I was trained
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="14-3" value="I give the customer all the relevant documents"> I give the customer all the relevant documents
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
                        <div class="panel-heading">Question 15:</div>
                        <div class="panel-body">
                            <p><strong>A customers raises a complaint with you. Do you: </strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="15-1" value="Tell them there is no point complaining because you have been through everything with them already and there are no other solutions"> Tell them there is no point complaining because you have been through everything with them already and there are no other solutions
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="15-2" value="Give them your regulator and Financial Ombudsman Service details"> Give them your regulator and Financial Ombudsman Service details
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="15-3" value="Provide them with your complaints procedure and full contact details"> Provide them with your complaints procedure and full contact details
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
                        <div class="panel-heading">Question 16:</div>
                        <div class="panel-body">
                            <p><strong>A customer asks who you are and what you do. Do you? </strong></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="16-1" value="Provide them with your full name, company name and explain the nature of the business and the reason for your call"> Provide them with your full name, company name and explain the nature of the business and the reason for your call
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="16-2" value="Give them your first name and advise you will explain everything else as you go along"> Give them your first name and advise you will explain everything else as you go along
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="16-3" value="Advise that you cannot give them any details over the phone but after they have agreed to take your service you will send them everything they have requested in writing"> Advise that you cannot give them any details over the phone but after they have agreed to take your service you will send them everything they have requested in writing
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