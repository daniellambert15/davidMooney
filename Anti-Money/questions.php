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
        $email->title = 'Anti-Money Laundering Assessment';

        // build the email
        $emailContent = '
        <ul>
            <li>Question: 1a) What does MLRO stand for?</li>
            <li>Answer: '.$_POST['1a'].'</li>
        </ul>
        <ul>
            <li>Question: 1b) Who is the firm\'s MLRO?</li>
            <li>Answer: '.$_POST['1b'].'</li>
        </ul>
        <ul>
            <li>Question: 2) In terms of Client Due Diligence, give an example of one area that we must undertake?</li>
            <li>Answer: '.$_POST['2'].'</li>
        </ul>
        <ul>
            <li>Question: 3) There are two main reasons for carrying out due diligence on a client, describe one?</li>
            <li>Answer: '.$_POST['3'].'</li>
        </ul>
        <ul>
            <li>Question: 4) Is there a greater potential for money laundering when we:</li>
            <li>Answer: '.$_POST['4'].'</li>
        </ul>
        <ul>
            <li>Question: 5) What two pieces of evidence do we require to prove a client\'s ID?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['5-1'].'</li>
                    <li>'.$_POST['5-2'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 6) Is this statement correct?<br />
            We should not enter into a business relationship unless identification of all relevant parties has been verified.</li>
            <li>Answer: '.$_POST['6'].'</li>
        </ul>
        <ul>
            <li>Question: 7) Where we deal with a client without meeting them, are we required to carry out additional verification?</li>
            <li>Answer: '.$_POST['7'].'</li>
        </ul>
        <ul>
            <li>Question: 8) What does PEP stand for?</li>
            <li>Answer: '.$_POST['8'].'</li>
        </ul>
        <ul>
            <li>Question: 9) Which of the following statements are correct?<br />
            The Money Laundering Regulations stipulate that client due diligence measures must be applied when we:</li>
            <li>Answer: <ol>
                    <li>'.$_POST['9-1'].'</li>
                    <li>'.$_POST['9-2'].'</li>
                    <li>'.$_POST['9-3'].'</li>
                    <li>'.$_POST['9-4'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 10) How long are records maintained after the end of the relationship with the client?</li>
            <li>Answer: '.$_POST['10'].'</li>
        </ul>
        <ul>
            <li>Question: 11) Which of the below Acts does not govern money laundering and terrorist funding in the UK?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['11-1'].'</li>
                    <li>'.$_POST['11-2'].'</li>
                    <li>'.$_POST['11-3'].'</li>
                    <li>'.$_POST['11-4'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 12) What does SAR stand for?</li>
            <li>Answer: '.$_POST['12'].'</li>
        </ul>
        <ul>
            <li>Question: 13) List 3 types of financial crime?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['13-1'].'</li>
                    <li>'.$_POST['13-2'].'</li>
                    <li>'.$_POST['13-3'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 14) NCA is the acronym for?</li>
            <li>Answer: '.$_POST['14'].'</li>
        </ul>
        <ul>
            <li>Question: 15) Name 3 areas that a Risk Based Approach encompasses?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['15-1'].'</li>
                    <li>'.$_POST['15-2'].'</li>
                    <li>'.$_POST['15-3'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 16) The Money Laundering Reporting Officer is responsible for sending suspicious activity reports to the NCA?</li>
            <li>Answer: '.$_POST['16'].'</li>
        </ul>
        <ul>
            <li>Question: 17) The Financial Action Task Force (FATF) is an:-</li>
            <li>Answer: <br />
            \'Independent <strong>'.$_POST['17-1'].'</strong> organisation that develops <strong>'.$_POST['17-2'].'</strong> to combat money laundering and <strong>'.$_POST['17-3'].'</strong> financing.\'
            </li>
        </ul>
        <ul>
            <li>Question: 18) Which of the below are stages of money laundering defined by the Proceeds of Crime Act?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['18-1'].'</li>
                    <li>'.$_POST['18-2'].'</li>
                    <li>'.$_POST['18-3'].'</li>
                    <li>'.$_POST['18-4'].'</li>
                    <li>'.$_POST['18-5'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 19) Name 4 ways of helping to prevent Money Laundering?</li>
            <li>Answer: <ol>
                    <li>'.$_POST['19-1'].'</li>
                    <li>'.$_POST['19-2'].'</li>
                    <li>'.$_POST['19-3'].'</li>
                    <li>'.$_POST['19-4'].'</li>
                </ol>
            </li>
        </ul>
        <ul>
            <li>Question: 20) The UK Money Laundering Regulations 2007 came into effect on?</li>
            <li>Answer: '.$_POST['20'].'</li>
        </ul>
        <ul>
            <li>Question: 21) The NCA was formed after SOCA was disbanded – what date did the NCA become fully operational?</li>
            <li>Answer: '.$_POST['21'].'</li>
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

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Anti-Money Laundering Assessment</h2>
                <p>
                    Can you answer these questions?
                </p>
            </div>
        </div>
        <?php if($completed){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Thank you for submitting your answers. We will be in contact with you shortly.</div>
                </div>
            </div>
        <?php } ?>

        <form action="questions.php" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1a:</div>
                        <div class="panel-body">
                            <p><strong>What does MLRO stand for?</strong></p>

                            <textarea class="form-control" name="1a"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 1b:</div>
                        <div class="panel-body">
                            <p><strong>Who is the firm's MLRO?</strong></p>

                            <textarea class="form-control" name="1b"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 2:</div>
                        <div class="panel-body">
                            <p><strong>In terms of Client Due Diligence, give an example of one area that we must undertake?</strong></p>

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
                            <p><strong>There are two main reasons for carrying out due diligence on a client, describe one?</strong></p>

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
                            <p><strong>Is there a greater potential for money laundering when we:</strong></p>
                            <select name="4" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="Deal with clients face to face">Deal with clients face to face</option>
                                <option value="Deal with clients on a none face to face basis">Deal with clients on a none face to face basis</option>
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
                            <p><strong>What two pieces of evidence do we require to prove a client's ID?</strong></p>

                            <div class="form-group">
                                <label for="5-1">Answer 1</label>
                                <input type="text" class="form-control" name="5-1">
                            </div>
                            <div class="form-group">
                                <label for="5-2">Answer 2</label>
                                <input type="text" class="form-control" name="5-2">
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
                            <p><strong>Is this statement correct?</strong></p>
                            <p>We should not enter into a business relationship unless identification of all relevant parties has been verified.</p>
                            <select name="6" class="form-control">
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
                        <div class="panel-heading">Question 7:</div>
                        <div class="panel-body">
                            <p><strong>Where we deal with a client without meeting them, are we required to carry out additional verification?</strong></p>


                            <textarea class="form-control" name="7"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 8:</div>
                        <div class="panel-body">
                            <p><strong>What does PEP stand for?</strong></p>

                            <textarea class="form-control" name="8"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 9:</div>
                        <div class="panel-body">
                            <p><strong>Which of the following statements are correct?</strong></p>

                            <p>The Money Laundering Regulations stipulate that client due diligence measures must be applied when we:
                            </p>

                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-1" value="Establish a business relationship"> Establish a business relationship
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-2" value="Carry out an occasional transaction"> Carry out an occasional transaction
                                    </label></li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-3" value="Suspect money laundering or terrorist financing"> Suspect money laundering or terrorist financing
                                    </label></li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="9-4" value="Doubt the veracity of documents, data or information previously obtained for the purpose of verifying identity."> Doubt the veracity of documents, data or information previously obtained for the purpose of verifying identity.
                                    </label></li>
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
                            <p><strong>How long are records maintained after the end of the relationship with the client?</strong></p>

                            <textarea class="form-control" name="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 11:</div>
                        <div class="panel-body">
                            <p><strong>Which of the below Acts does not govern money laundering and terrorist funding in the UK?</strong></p>

                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-1" value="The Proceeds of Crime Act 2002"> The Proceeds of Crime Act 2002
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-2" value="Serious Organised Crime &amp; Police Act 2005"> Serious Organised Crime &amp; Police Act 2005
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-3" value="Data Protection Act 1998"> Data Protection Act 1998
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="11-4" value="Terrorism Act 2000"> Terrorism Act 2000
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
                            <p><strong>What does SAR stand for?</strong></p>

                            <textarea class="form-control" name="12"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 13:</div>
                        <div class="panel-body">
                            <p><strong>List 3 types of financial crime?</strong></p>
                            <div class="form-group">
                                <label for="13-1">Answer 1</label>
                                <input type="text" class="form-control" name="13-1">
                            </div>
                            <div class="form-group">
                                <label for="13-2">Answer 2</label>
                                <input type="text" class="form-control" name="13-2">
                            </div>
                            <div class="form-group">
                                <label for="13-3">Answer 3</label>
                                <input type="text" class="form-control" name="13-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 14:</div>
                        <div class="panel-body">
                            <p><strong>NCA is the acronym for?</strong></p>
                            <select name="14" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="National Crime Agency">National Crime Agency</option>
                                <option value="Nationwide Crime Association">Nationwide Crime Association</option>
                                <option value="National Organised Crime Association">National Organised Crime Association</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 15:</div>
                        <div class="panel-body">
                            <p><strong>Name 3 areas that a Risk Based Approach encompasses?</strong></p>

                            <div class="form-group">
                                <label for="15-1">Answer 1</label>
                                <input type="text" class="form-control" name="15-1">
                            </div>
                            <div class="form-group">
                                <label for="15-2">Answer 2</label>
                                <input type="text" class="form-control" name="15-2">
                            </div>
                            <div class="form-group">
                                <label for="15-3">Answer 3</label>
                                <input type="text" class="form-control" name="15-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 16:</div>
                        <div class="panel-body">
                            <p><strong>The Money Laundering Reporting Officer is responsible for sending suspicious activity reports to the NCA?</strong></p>
                            <select name="16" class="form-control">
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
                        <div class="panel-heading">Question 17:</div>
                        <div class="panel-body">
                            <p><strong>The Financial Action Task Force (FATF) is an:-</strong> <small>(fill in the blanks)</small></p>

                            <p>
                                'Independent <input type="text" name="17-1"> organisation that develops <input type="text" name="17-2"> to combat money
                                laundering and <input type="text" name="17-3"> financing.'
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 18:</div>
                        <div class="panel-body">
                            <p><strong>Which of the below are stages of money laundering defined by the Proceeds of Crime Act?</strong> <small>(You can tick more than one)</small></p>
                            <ol>
                                <li>
                                    <label>
                                        <input type="checkbox" name="18-1" value="Integration"> Integration
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="18-2" value="Filtering"> Filtering
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="18-3" value="Placement"> Placement
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="18-4" value="Cleaning"> Cleaning
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" name="18-5" value="Layering"> Layering
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
                        <div class="panel-heading">Question 19:</div>
                        <div class="panel-body">
                            <p><strong>Name 4 ways of helping to prevent Money Laundering?</strong></p>
                            <div class="form-group">
                                <label for="19-1">Answer 1</label>
                                <input type="text" class="form-control" name="19-1">
                            </div>
                            <div class="form-group">
                                <label for="19-2">Answer 2</label>
                                <input type="text" class="form-control" name="19-2">
                            </div>
                            <div class="form-group">
                                <label for="19-3">Answer 3</label>
                                <input type="text" class="form-control" name="19-3">
                            </div>
                            <div class="form-group">
                                <label for="19-4">Answer 4</label>
                                <input type="text" class="form-control" name="19-4">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 20:</div>
                        <div class="panel-body">
                            <p><strong>The UK Money Laundering Regulations 2007 came into effect on?</strong></p>
                            <select name="20" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="December 25, 2001">December 25, 2001</option>
                                <option value="April 17, 2008">April 17, 2008</option>
                                <option value="December 15, 2007">December 15, 2007</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Question 21:</div>
                        <div class="panel-body">
                            <p><strong>The NCA was formed after SOCA was disbanded – what date did the NCA become fully operational?</strong></p>
                            <select name="21" class="form-control">
                                <option value="select">- Please Select -</option>
                                <option value="17th October 2011">17th October 2011</option>
                                <option value="7th October 2013">7th October 2013</option>
                                <option value="27th December 2012">27th December 2012</option>
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